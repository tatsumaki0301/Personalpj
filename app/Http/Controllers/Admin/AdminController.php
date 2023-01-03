<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PersonRequest;
use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\Shop;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {

        $persons = Person::orderBy('created_at')->Paginate(5);
        
        $param = [
            'persons' => $persons,
        ];

        return view('admin.admin', $param);

    }

    public function create(PersonRequest $request)
    {
        $password = Hash::make($request->password);
        
        $form = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
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

    public function show_users()
    {
        $users = User::all();

        $param = [
            'users' => $users,
        ];

        return view('admin.users', $param);
    }
}
