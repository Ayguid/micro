<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models440\Category;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
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

  public function showCategoryChilden($id)
  {
    $cat = Category::find($id);
    return view('admin.categories-children')->with('cat', $cat);
  }


  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
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

    $save = false;
    $validator = Validator::make($request->all(), [
      'desc_es' => 'required|string|max:255',
      // 'product_category' => 'required|integer|max:100',
    ]);
    if ($validator->fails())
    {
      $save = false;
    }
    else if (!$validator->fails())
    {
      $cat = new Category($request->all());
      $save =$cat->save();
    }
    if ($save)
    {
      $request->session()->flash('alert-success', 'Agregaste con exito!');
      return redirect()->back();
    }
    else
    {
      $request->session()->flash('alert-danger', 'Oops there was a problem!');
      return redirect()->back()->withInput($request->all())->withErrors($validator);
    }

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
    //

  }




  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $save = false;
    $validator = Validator::make($request->all(), [
      'desc_es' => 'required|string|max:255',
      // 'product_category' => 'required|integer|max:100',
    ]);
    if ($validator->fails())
    {
      $save = false;
    }
    else if (!$validator->fails())
    {
      $cat = Category::find($id);
      $cat->desc_es = $request->desc_es;
      $save =$cat->save();
    }
    if ($save)
    {
      $request->session()->flash('alert-success', 'Editaste con exito!');
      return redirect()->back();
    }
    else
    {
      $request->session()->flash('alert-danger', 'Oops there was a problem!');
      return redirect()->back()->withInput($request->all())->withErrors($validator);
    }
  }




  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }




}
