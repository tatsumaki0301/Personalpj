<?php

namespace App\Http\Controllers;

use App\Models\Shop;
Use App\Models\Favorite;
use App\Models\User;
use App\Models\Area;
use App\Models\Genru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $areas = Area::all();
        $genrus = Genru::all();
        $shops = Shop::with('area', 'genru')->with(
            'favorite', function ($query){
                $query->where('user_id', '=', Auth::id());
            }
            )->get();


            $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genrus' => $genrus,
            'input' => $request->input,
            'user' => $user,
            'id' => $id,
        ];

        return view('index', $param, [
            'shops' => $shops,
            'input' => '',
        ]);
    }


    public function search(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $areas = Area::get();
        $genrus = Genru::get();
        $shops = Shop::get();
        $shops = Shop::with('area', 'genru','favorite')->get();


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
            'id' => $id,

        ];
        return view('index', $param, [
            'shops' => $shops,
        ]);
    }

    
    public function done()
    {
        return view('done');
    }
    
    public function thanks()
    {
        return view('thanks');
    }

}
