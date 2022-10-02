<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genru;
use App\Models\User;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\FavoriteRequest;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $shops = Shop::get();
        $reserves = Reserve::all();
        $favorite = Favorite::get();
        $favorite = Favorite::with('shop', 'user')->get();

        $param = 
        [
            'user' => $user,
            'id' => $id,
            'shops' => $shops,
            'favorite' => $favorite,
            'reserves' => $reserves, 
        ];

        return view('favorite', $param);
    }

    public function like(Request $request)
    {
        $favorite = $request->shop_id;
        $id = Auth::id();

        $favorites = [
            'shop_id' => $favorite,
            'user_id' => $id
        ];

        Favorite::create($favorites);

        return back();
    }


    public function remove(Request $request)
    {
        $id = Auth::id();
        $favorite = favorite::where('user_id', $id)->where('shop_id', $request->shop_id)->get();


        Favorite::where('user_id', $id)->where('shop_id', $request->shop_id)->delete();

        return back();
    }
}
