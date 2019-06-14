<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

use App\Models440\Category;
use App\Models440\Cilindro;
use App\Models440\Valvula;
use App\Models440\Estacion_De_Valvula;
use App\Models440\Valvula_Auxiliar;
use App\Models440\Equipo_Para_Vacio;
use App\Models440\Manipulacion_Y_Equipo;
use App\Models440\Unidad_FRL;
use App\Models440\Conexion;
use App\Models440\Proceso;
use App\Models440\Automatizacion_Y_Control;
use App\Models440\Product;

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



    public function productsInCategory($id = null)
    {
      $products=[];
      if ($id) {
        $category=Category::find($id);
        $products=$category->products()->paginate(5);
      }

      $categories=Category::where('parent_id', null)->get();
      $data=[
        // 'categories'=>$categories,
        'category'=>$category,
        'products'=>$products,
      ];

      return view('admin.products-admin')->with('data', $data);
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
    return DB::transaction(function () use ($request) {
        $save = false;
        // dd($request);
        //table_id 1 start
        if ($request->table_name=='cilindros') {
          $validator = Validator::make($request->all(), [
            'C_digo' => 'required|string|max:255',
            'Modelo' => 'required|string|max:255',
            'Tipo' => 'required|string|max:255',
            // 'product_category' => 'required|integer|max:100',
          ]);
          if ($validator->fails())
          {
            $save = false;
          }
          else if ($no_fails = !$validator->fails())
          {
            $obj = new Cilindro($request->all());
          }
        }
        //table_id 1 end

        //aplica para todos los products
        if ($no_fails) {
          $obj->save();
          $prod = new Product();
          $prod->C_digo = $request->C_digo;
          $prod->child_id = $obj->id;
          $prod->category_id = $request->category_id;
          $prod->table_name = $obj->getTableName();
          $prod->save();
          $save=true;
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
        //
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
