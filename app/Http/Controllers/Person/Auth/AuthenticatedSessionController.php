<?php

namespace App\Http\Controllers\Person\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PersonLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genru;
use App\Models\Reserve;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('person.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PersonLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $shops = Person::where('email', '=', $request->email)->with('shops', 'area', 'genru')->first();
        $image_path = Shop::with('person')->where('id', '=', $shops->id)->first();
        $areas = Area::get();
        $genrus = Genru::get();
        $reserves = Reserve::with('user')->with('shop')->where('shop_id', '=', $shops->id)->get();

        $param = [
            'areas' => $areas,
            'genrus' => $genrus,
            'shops' => $shops,
            'reserves' => $reserves,
            'image_path' => $image_path,
        ];

        return view('person.person', $param);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
