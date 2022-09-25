<?php

namespace App\Http\Controllers;

use App\Models\Shop;
Use App\Models\Favorite;
use App\Models\User;
use App\Models\Area;
use App\Models\Genru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\FavoriteRequest;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $favorites = Favorite::get();
        $shops = Shop::all();
        $areas = Area::all();
        $genrus = Genru::all();
        $shops = Shop::with('area', 'genru','favorite')->get();

        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genrus' => $genrus,
            'input' => $request->input,
            'user' => $user,
            'favorites' => $favorites,
        ];

        return view('index', $param, ['shops' => $shops, 'input' => '']);
    }


    public function search(Request $request)
    {
        $user = Auth::user();
        $areas = Area::get();
        $genrus = Genru::get();
        $favorite = Favorite::get();
        $shops = Shop::get();
        $shops = Shop::with('area', 'genru')->get();

        $input = htmlspecialchars($_POST['input'], ENT_QUOTES);
        $area_id = htmlspecialchars($_POST['area_id'], ENT_QUOTES);
        $genru_id = htmlspecialchars($_POST['genru_id'], ENT_QUOTES);

        $query = Shop::query();

        if($input){
            $query->where('shop_name', 'LIKE BINARY', "%{$input}%");
        }
        elseif($input == "" && $area_id && $genru_id == "All genru"){
            $query->where('area_id', $area_id);
        }
        elseif($input == "" && $area_id == "All area" && $genru_id){
            $query->where('genru_id', $genru_id);
        }
        elseif($input == "" && $area_id && $genru_id){
            $query->where('area_id', $area_id)->where('genru_id', $genru_id);
        }

        $shops = $query->get();

        if($input == "" && $area_id == "All area" && $genru_id == "All genru"){
            $shops = shop::get();
        }

        $param = [
            'input' => $request->input,
            'areas' => $areas,
            'genrus' => $genrus,
            'shops' => $shops,
            'user' => $user,
            'favorite' => $favorite
        ];

        return view('index', $param, ['shops' => $shops]);
    }

    
    public function done()
    {
        return view('done');
    }
    public function thanks()
    {
        return view('thanks');
    }


    public function file(Request $request)
    {

        $shops = Shop::all();
        $areas = Area::all();
        $genrus = Genru::all();
        $shops = Shop::with('area', 'genru')->get();
        
        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genrus' => $genrus,
        ];
        return view('file', $param, ['shops' => $shops],);
    }
    public function create(ShopRequest $request)
    {

        $image_path = $request->file('image_path');
        $path = $image_path->store('img','public');
        
        $form = [
            'shop_name' => $request->shop_name,
            'shop_content' => $request->shop_content,
            'image_path' => $path,
            'area_id' => $request->area_id,
            'genru_id' => $request->genru_id,
        ];
        unset($form['_token']);
        Shop::create($form);

        return redirect('/file');
    }
}
