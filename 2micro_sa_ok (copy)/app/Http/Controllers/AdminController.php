<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models440\Category;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=null)
    {
        $categories=Category::where('parent_id', $id)->get();
        return view('admin.admin')->with('categories', $categories);
    }
}
