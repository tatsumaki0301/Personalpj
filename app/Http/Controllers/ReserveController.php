<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use DateTime;

class ReserveController extends Controller
{
    public function create(Request $request)
    {
        $reserves = Reserve::with('shop','user')->get();
        
        $datetime = date('Y-m-d H:i',strtotime($request->date.  $request->time));
        
        $form = [
            'datetime' => $datetime,
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'user_number'=> $request->user_number
        ];
        Reserve::create($form);
        return back();
    }
}
