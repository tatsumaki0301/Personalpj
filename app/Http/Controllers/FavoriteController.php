<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genru;
use App\Models\User;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\FavoriteRequest;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {
        $user = Auth::user();
        $shops = Shop::get();
        $favorite = Favorite::get();
        $favorite = Favorite::with('shop', 'user')->get();

        $param = 
        [
            'user' => $user,
            'shops' => $shops,
            'favorite' => $favorite
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
        $favorite = Favorite::get();
        $favorite = Favorite::find('id');

        Favorite::find($request->id)->delete();     

        return back();
    }
}
