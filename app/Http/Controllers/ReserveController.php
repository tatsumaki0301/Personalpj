<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use DateTime;

class ReserveController extends Controller
{
    public function create(ReserveRequest $request)
    {
        $reserves = Reserve::with('shop','user')->get();
        $validated = $request->validated();

        
        $datetime = date('Y-m-d H:i',strtotime($request->date.  $request->time));
        
        $form = [
            'datetime' => $datetime,
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'user_number'=> $request->user_number,
            'validated' => $validated,
        ];
        Reserve::create($form);
        return view('done');
    }

    public function update(ReserveRequest $request)
    {
        $user_id = $request->user_id;
        $shop_id = $request->shop_id;
        $user_number = $request->user_number;
        $datetime = date('Y-m-d H:i',strtotime($request->date.  $request->time));
        
        $param = [
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'datetime' => $datetime,
            'user_number' => $user_number,
        ];

        Reserve::where('id', $request->id)->update($param);

        return redirect('/mypage');
    }

    public function delete(Request $request)
    {

        Reserve::find($request->deleteId)->delete();

        return back();
    }


}
