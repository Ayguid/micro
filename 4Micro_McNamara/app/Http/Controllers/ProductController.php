<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

use App\Models440\Category;
use App\Models440\Product;
use App\Models440\Product_Attribute_Value;
use App\Models440\Attribute_Value;
use App\Models440\Product_In_Country;


class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }




  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */


  public function create()
  {

  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    // dd($request);
    return DB::transaction(function () use ($request) {
      $save = false;
      $prod = new Product($request->all());
      $save = $prod->save();

      if ($request->country_id) {
        foreach ($request->country_id as $key => $value) {
          $prodInCt = new Product_In_Country();
          $prodInCt->country_id=$value;
          $prodInCt->product_id=$prod->id;
          $save = $prodInCt->save();
        }
      }

      if ($request['attributes']) {
        foreach ($request['attributes'] as $keyAtt => $valueAtt) {
          $attVal= new Attribute_Value();
          $attVal->attribute_id = $keyAtt;
          $attVal->attribute_value_desc = $valueAtt;
          $attVal->save();
          $prodAttVal= new Product_Attribute_Value();
          $prodAttVal->product_id=$prod->id;
          $prodAttVal->attribute_value_id=$attVal->id;
          $save = $prodAttVal->save();
        }
      }

      if ($save)
      {
        $request->session()->flash('alert-success', 'Agregaste con exito!');
        return redirect()->back();
      }
      else
      {
        $request->session()->flash('alert-danger', 'Oops there was a problem!');
        return redirect()->back();
      }
    });
  }


  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $product = Product::find($id);
    $cat = Category::find($product->category_id);
    $parents = collect([]);
    $parent = $cat->father;
    while(!is_null($parent)) {
      $parents->push($parent);
      $parent = $parent->father;
    }
    $original_cat= $parents[$parents->count()-1];
    $data = [
      'product'=>$product,
      'original_cat'=>$original_cat
    ];
    return view('admin.product-edit')->with('data', $data);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request)
  {
    //
    return DB::transaction(function () use ($request) {
      $save = false;
      $prod = Product::find($request->product_id);
      $save = $prod->update($request->all());

      //delete
      foreach ($prod->possibleCountries() as $country) {
        $t = false;
        $y = false;
        if ($prod->isInCountry($country->id)) {
          if ($request->country_id) {
            foreach ($request->country_id as $key => $value) {
              ($value == $country->id)? $t=true : false;
            }
          }
          if (!$t) {
            $p = Product_In_Country::all()->where('country_id', '=', $country->id)->where('product_id', '=', $prod->id)->first();
            $save=$p->delete();
          }
        }
        //save
        if (!$prod->isInCountry($country->id)) {
          if ($request->country_id) {
            foreach ($request->country_id as $key => $value) {
              ($value == $country->id)? $y=true : false;
            }
            if ($y) {
              $prodInCt = new Product_In_Country();
              $prodInCt->country_id=$country->id;
              $prodInCt->product_id=$prod->id;
              $save = $prodInCt->save();
            }
          }
        }
      }


      foreach ($request['attributes'] as $keyAtt => $valueAtt) {
        if ($pa = $prod->attributeValue($keyAtt)) {
          $pa->attribute_value_desc = $valueAtt;
          $pa->save();
        }
        else {
          $attVal= new Attribute_Value();
          $attVal->attribute_id = $keyAtt;
          $attVal->attribute_value_desc = $valueAtt;
          $attVal->save();
          $prodAttVal= new Product_Attribute_Value();
          $prodAttVal->product_id=$prod->id;
          $prodAttVal->attribute_value_id=$attVal->id;
          $save = $prodAttVal->save();
        }
      }

      if ($save)
      {
        $request->session()->flash('alert-success', 'Editaste con exito!');
        return redirect()->back();
      }
      else
      {
        $request->session()->flash('alert-danger', 'Oops there was a problem!');
        return redirect()->back();
      }
    });
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    return DB::transaction(function () use ($id) {
      $save = false;
      $prod=Product::find($id);
      $attributeValues=$prod->attributeValues;
      $save = $attributeValues->each->delete();
      if ($save) {
        $prAttVal=Product_Attribute_Value::where('product_id', $id)->get();
        $prdsInCts=Product_In_Country::where('product_id', $id)->get();
        $prdsInCts->each->delete();
        $save = $prAttVal->each->delete();
      }
      $save = $prod->delete();
      if ($save){
        \Session::flash('alert-success', 'Borraste con exito!');
        return redirect()->back();
      }else{
        \Session::flash('alert-danger', 'Oops there was a problem!');
        return redirect()->back();
      }
    });
  }

}
