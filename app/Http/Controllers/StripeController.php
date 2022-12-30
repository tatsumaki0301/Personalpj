<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\User;

class StripeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('stripe.subscription', [
            'intent' => $user->createSetupIntent()
        ]);
    }

    public function afterpay(Request $request)
    {
        $user = Auth::user();
        $stripeCustomer = $user->createOrGetStripeCustomer();
        $paymentMethod = $request->input('stripePaymentMethod');
        $plan = config('services.stripe.basic_plan_id');
        $user->newSubscription('default', $plan)->create($paymentMethod);

        return back();
    }

}
