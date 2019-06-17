<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models440\File;


class FileController extends Controller
{
  //


  public function index()
  {
    return view('admin.media');
  }



  public function upload(Request $request)
  {
    $input = $request->file('file');
    $extension= $input->getClientOriginalExtension();
    if ($extension =='png' || $extension =='jpg' || $extension =='jpeg') {
      $directory='storage/product_images/';
      $validator = Validator::make($request->all(), [
        'file' => 'image|max:3000',
      ]);

    }

    if ($extension =='pdf') {
      $directory='storage/pdfs/';
      $validator = Validator::make($request->all(), [
        'file' => 'mimes:pdf',
      ]);
    }



      if ($validator->fails())
      {
        $message = $validator->errors();
        return  response()->json(['errors' => $message, 422]);

      }else {
      $name = $input->getClientOriginalName();
      $save = $input->move($directory, $name);
      if ($request->product_id) {
        $file = new File();
        $file->file_path=$name;
        $file->fileable_id=$request->product_id;
        $file->fileable_type='App\Models440\Product';
        $file->save();
      }
      if ($save) {
        return response('Todo bien'.$save, 200);
      }else {
        return response('No se que pacho', 404);
      }
    }
  }




  public function destroy(Request $request, $string)
  {
    if ($request->product_id) {
      $tableFile = File::where('fileable_id', $request->product_id)->where('file_path',$string)->first();
      $destroy = $tableFile->delete();
      $msg = 'Deleted from table';
    }else {
      $msg = 'Deleted from disk';
      $destroy =Storage::delete('public/product_images/'.$string);
    }
    if ($destroy) {
      return response($msg, 200);
    }
  }












}
