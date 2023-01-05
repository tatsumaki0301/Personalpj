<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailler;
use App\Mail\ReserveMail;
use App\Models\Reserve;
use App\Models\User;


class MailController extends Controller
{
    public function send(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        $param = [
            'name' => $name,
            'email' => $email,
        ];

        Mail::send(new Mailler($name, $email));

        return view('emails.mail', $param);

    }

    public function reservemail(Request $request)
    {

        $reserves = Reserve::where('id', '=', $request->id)->with('shop', 'user')->first();

        $to = [
            [
                'email' => $reserves->user->email,
                'name' => $reserves->user->name,
            ]
            ];
            
        Mail::to($to)->send(new ReserveMail($reserves));

        return view('emails.reservemail', ['reserves' => $reserves]);

    }
}
