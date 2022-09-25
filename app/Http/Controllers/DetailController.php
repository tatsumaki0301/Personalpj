<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Area;
use App\Models\Genru;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DetailController extends Controller
{
        public function detail()
    {
        $user = Auth::user();

        $param = [
            'user' => $user,
        ];
        
        return view('detail', $param, ['input' => '']);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::get();
        $shop = Shop::find($request->input);
        $param = [
            'user' => $user,
            'shop' => $shop,
            'input' => $request->input,
        ];
        return view('detail', $param);
    }

}
