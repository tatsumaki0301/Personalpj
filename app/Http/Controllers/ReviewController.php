<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Star;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function index(Request $request) 
    {

        $user = Auth::user();
        $id = Auth::id();
        $reserves = Reserve::where('id', $request->reviewId)->with('user')->where('user_id', '=', $id)->get();
        $stars = Star::get();
        
        $param = [
            
            'reserves' => $reserves,
            'user' => $user,
            'stars' => $stars,
            'user_id' => $id,

        ];

        return view('product.star', $param);
    }

    public function create(ReviewRequest $request )
    {

        $form = [
            'comment' => $request->comment,
            'user_id' => $request->user_id,
            'shop_id' => $request->shop_id,
            'reserve_id' => $request->reserve_id,
            'star_id' => $request->star_id,
        ];

        Review::create($form);

        return view('product.entry');

    }

    public function verror()
    {
        return view('product.verror');
    }


    public function review(Request $request)
    {
        $user = Auth::user();
        $reviews = Review::with('shop')->where('shop_id', '=', $request->shop_id)->with('star')->get();
        
        $param = [
            'reviews' => $reviews,
            'user' => $user,
        ];

        return view('product.review', $param);
    }

}
