<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        return view('file');
    }

    public function upload(Request $request)
    {


        $file = $request->file('file');

        $disk = Storage::disk('s3')->putFile('/', $file);
        
        $url =Storage::disk('s3')->url($disk);

        return redirect('/file');
    }

}
