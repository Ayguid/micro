<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models440\Category;
use App\Models440\Country;
use App;

class LandingController extends Controller
{
  //
  public function index($id=null)
  {

    $products=[];
    if ($country = session('country')) {
      if ($id) {
        $cat=Category::find($id);
        $products=$cat->productsInCountry($country->id)->paginate(5);
      }
      $categories=Category::where('parent_id', null)->get();
      $data=[
        'categories'=>$categories,
        'products'=>$products,
      ];
      return view('country_landing')->with('data', $data);
    }else {
      return view('welcome');
    }
  }



  public function setCountry($id = null)
  {
    $country=[];
    if ($id) {
      $country = Country::where('id', $id)->first();
    }
    session([
      'country' => $country,
    ]);
    return redirect(route('landing'));
  }


}
