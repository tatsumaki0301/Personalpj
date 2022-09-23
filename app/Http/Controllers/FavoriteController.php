<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\FavoriteRequest;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {
        $user = Auth::user();
        $shops = Shop::get();

        $param = 
        [
            'user' => $user,
            'shops' => $shops
        ];

        return view('favorite', $param);
    }
}
