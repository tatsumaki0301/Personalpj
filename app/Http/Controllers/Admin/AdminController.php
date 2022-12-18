<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Shop;

class AdminController extends Controller
{
    public function index()
    {

        $persons = Person::get();
        
        $param = [
            'persons' => $persons,
        ];

        return view('admin.admin', $param);

    }

    public function create(PersonRequest $request)
    {

        $form = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        Person::create($form);

        return back();
    }

    public function update(Request $request)
    {

        $form = [
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
        ];
        unset($form['_token']);
        Person::where('id', $request->id)->update($form);

        return back();
    }

    public function delete(Request $request)
    {
        
        Person::find($request->id)->delete();

        return back();
        
    }
}
