<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadController extends Controller
{
    public function upload(Request $request) {
        //$file = $request->file($request->fileName);
        //if ($request->hasFile($request->fileName)) {
            return response()->json([
                'message' => 'Success receiving file',
                'fileName' => $request->fileName,
                'file' => $request->mfile,
                'debug' => $_FILES
            ], 201);
     /*   }
        else {
            return response()->json([
                'errors' => 'Error receiving file',
            ], 422);
        }*/
    }
}
