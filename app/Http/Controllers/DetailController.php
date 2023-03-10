<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class DetailController extends Controller
{
        public function detail(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $shops = Shop::get();
        $reserves = Reserve::with('shop','user')->get();
        if($id){
            $reserves = Auth::user()->reserve()->paginate(1);
        }


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
