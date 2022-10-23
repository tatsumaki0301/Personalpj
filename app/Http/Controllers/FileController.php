<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;


class FileController extends Controller
{
    public function file(Request $request)
    {

        $file_images = File::get();

        $param = [
            'file_images' => $file_images,
        ];

        return view('file', $param);
    }
    public function create(FileRequest $request)
    {

        $file_img = $request->file('file_image');
        $path = $file_img->store('img','public');
        
        $form = [
            'file_image' => $path,
        ];
        unset($form['_token']);
        File::create($form);

        return redirect('/file');
    }

}
