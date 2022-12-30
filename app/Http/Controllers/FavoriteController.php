<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Favorite;
use App\Models\Reserve;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\FavoriteRequest;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $reserves = Auth::user()->reserve()->paginate(1, ["*"], 'user-page')->appends(['favorite-page' => \Request::get('favorite-page')]);
        $favorite = Auth::user()->favorite()->paginate(2, ["*"], 'favorite-page')->appends(['user-page' => \Request::get('user-page')]);

        $shops = Shop::with('area', 'genru')->with(
            'favorite', function ($query){
                $query->where('user_id', '=', Auth::id());
            }
            )->get();

        $time = 0;
        $timers = array();
        for($k = 0; $k < 7; $k++)
        {
            $time = strtotime('01:00 + '.($k * 30). 'minute') - strtotime('17:00');
            $timers[$time] = date('H:i', $time);
        }

            $param = 
        [
            'user' => $user,
            'id' => $id,
            'shops' => $shops,
            'favorite' => $favorite,
            'reserves' => $reserves, 
            'timers' => $timers,
        ];

        return view('favorite', $param);
    }

    public function like(favoriteRequest $request)
    {
        $favorite = $request->shop_id;
        $user_id = $request->user_id;
        $id = Auth::id();
        $user_id = $id;

        $favorites = [
            'shop_id' => $favorite,
            'user_id' => $user_id,
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
