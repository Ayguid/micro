<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Master_Category;

use App\Helper_Functions\PaginatorHelper;

class ProductController extends Controller
{
    use PaginatorHelper;



    public function showProductsByCategory($id)
    {
      $collection = Master_Category::find($id)->getProducts;
      $products=$this->paginate($collection, $perPage = 10, $page = null);
      return view('catalogue.products')->with('products', $products);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Master_Category  $master_Category
     * @return \Illuminate\Http\Response
     */
    public function show(Master_Category $master_Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Master_Category  $master_Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Master_Category $master_Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master_Category  $master_Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master_Category $master_Category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master_Category  $master_Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master_Category $master_Category)
    {
        //
    }
}
