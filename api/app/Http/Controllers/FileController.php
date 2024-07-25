<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request){
        try{
            if($request->hasFile('img')){
                $file = $request->file('img');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $filename);
                return response()->json(['message'=>'File uploaded successfully', 'filename'=>$filename]);
            }
        }catch(\Exception $e){
            return response()->json(['message'=>'Error uploading file', 'error'=>$e->getMessage()], 500);
        }
    }


}
