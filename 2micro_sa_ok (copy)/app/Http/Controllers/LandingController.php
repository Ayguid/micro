<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models440\Category;
use App\Models440\Product;


class LandingController extends Controller
{


  public function __construct()
  {
    // $this->middleware('auth');
  }



  public function index($id=null)
  {
    $products=[];
    if ($id) {
      $cat=Category::find($id);
      $products=$cat->products()->paginate(5);
    }

    $categories=Category::where('parent_id', null)->get();
    $data=[
      'categories'=>$categories,
      'products'=>$products,
    ];

    return view('welcome')->with('data', $data);
  }



//
//
//
// public function showProduct($id)
// {
//   $product = Product::find($id);
//   return view('product')->with('product', $product);
// }
//
//






}
