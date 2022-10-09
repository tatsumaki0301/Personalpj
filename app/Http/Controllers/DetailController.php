<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Area;
use App\Models\Genru;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;



class DetailController extends Controller
{
        public function detail(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $shops = Shop::get();
        $reserves = Auth::user()->reserve;

        $time = 0;
        $ret = array();
        for($i = 0; $i < 7; $i++)
        {
            $time = strtotime('01:00 + '.($i * 30). 'minute') - strtotime('17:00');
            $ret[$time] = date('H:i', $time);
        }

        $query = Shop::query();

        if($request->shop_id){
            $query->where('id', $request->shop_id);
        }

        $shops = $query->get();

        $param = [
            'shops' => $shops,
            'user' => $user,
            'id' => $id,
            'ret' => $ret,
            'reserves' => $reserves,
        ];

        return view('detail', $param, ['shops' => $shops]);

    }

}
