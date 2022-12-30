<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Reserve;
use App\Models\Shop;
use App\Models\User;


class QrCodeController extends Controller
{
    public function index(Request $request)
    {
        $reserves = Reserve::where('id', $request->qrcodeId)->with('user','shop')->get();

        return view('qrcode.qrcode', ['reserves' => $reserves]);
    }

    public function show(Request $request)
    {
        $reserves = Reserve::where('id', $request->qrcodeId)->with('user','shop')->get();


        return view('qrcode.qrcodeview', ['reserves' => $reserves]);

    }

}
