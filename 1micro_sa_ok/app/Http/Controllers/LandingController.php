<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models440\Category;
use App\Models440\Product;
use App\Helper_Functions\getClassHelper;

class LandingController extends Controller
{
  use getClassHelper;

  public function __construct()
  {
    // $this->middleware('auth');
  }



  public function index($id=null)
  {

    $categories=Category::where('parent_id', $id)->get();
    $cat=Category::where('table_id', $id)->first();

    $data=[
      'cat'=>$cat,
      'categories'=>$categories
    ];

    return view('welcome')->with('data', $data);
  }




  public function productsByCategory($id)
  {
    $cat=Category::find($id);
    $masterCat=Category::find($cat->table_id);
    $products=$cat->products();

    $data=[
      'cat'=>$cat,
      'masterCat'=>$masterCat,
      'products'=>$products->paginate(5),
      'models'=>$cat->models()
    ];
    return view('welcome')->with('data', $data);
  }




  public function productsByModel($id,$string)
  {
    $cat=Category::find($id);
    $masterCat=Category::find($cat->table_id);

    $class=$this->classGetter($cat->table_id);
    $new=new $class();
    $table = $new->getTableName();

    $products = Product::join($table, $table.'.id','=', 'products.child_id')
        ->where('Modelo','=', $string)->where('products.category_id', $cat->id);

    $data=[
      'cat'=>$cat,
      'masterCat'=>$masterCat,
      'products'=>$products->paginate(5),
      'models'=>$cat->models()
    ];

    return view('welcome')->with('data', $data);
  }



public function showProduct($id)
{
  $product = Product::find($id);
  return view('product')->with('product', $product);
}








}
