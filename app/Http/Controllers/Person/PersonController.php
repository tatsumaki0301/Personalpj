<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Person;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genru;
use App\Models\Reserve;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PersonController extends Controller
{
    public function index(Request $request)
    {
        $shops = Person::where('email', '=', $request->email)->with('shops', 'area', 'genru')->first();
        $image_path = Shop::with('person')->where('id', '=', $shops->id)->first();
        $areas = Area::get();
        $genrus = Genru::get();
        $reserves = Reserve::with('user')->with('shop')->where('shop_id', '=', $shops->id)->get();

        $param = [
            'areas' => $areas,
            'genrus' => $genrus,
            'shops' => $shops,
            'reserves' => $reserves,
            'image_path' => $image_path,
        ];
        return view('person.person', $param);
    }

    public function update(Request $request)
    {
        $posts = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $form = [
            'id' => $request->id,
            'area_id' => $request->area_id,
            'genru_id' => $request->genru_id,
            'person_id' => $request->person_id,
            'image_path' => $request->image_path,
            'shop_content' => $request->shop_content,
        ];
        unset($form['_token']);
        Shop::where('id', $request->id)->update($form);
        return view('person.auth.login');
    }

    public function create(Request $request)
    {

        $file = $request->file('image_path');

        if( app()->isLocal() || app()->runningUnitTests() ) {

            $path = $file->store('images', 'public');
            $url = Storage::url($path);

        }
        else{

            $path = Storage::disk('s3')->putFile('/', $file);
            $url =Storage::disk('s3')->url($path);

        }

        $param = [
            'shop_name' => $request->shop_name,
            'area_id' => $request->area_id,
            'genru_id' => $request->genru_id,
            'person_id' => $request->person_id,
            'shop_content' => $request->shop_content,
            'image_path' => $url,
        ];

        Shop::create($param);

        return view('person.auth.login');
    }

}
