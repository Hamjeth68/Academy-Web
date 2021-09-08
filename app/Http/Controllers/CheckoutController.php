<?php

namespace App\Http\Controllers;

use App\Models\CoursePurchased;
use App\Models\CurrencyRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_ENjlKW3jcKVquuhpGL7cIga8005cF2laV0');

        if(Session::has('cart'))
        {

            $rates = CurrencyRate::where('code', 'GBP')->first();

            $cart = Session::get('cart');

            $cart->updateCurrency($rates);
            Session::put('cart', $cart);

            $data = (Session::get('cart'));

            $name = auth()->user()->name;

            $totalamount = $data->totalPrice;

            $courses = CoursePurchased::all();

            if(!empty($courses)) {

                $latestOrder = CoursePurchased::orderBy('created_at', 'DESC')->first();

                $target_entry = CoursePurchased::where('created_at', $latestOrder->created_at)->first();

            }else{

                $target_entry = '1';
            }

            if($target_entry == '1') {
                $refNumber = 'LM' . str_pad('1', 8, "0", STR_PAD_LEFT);
            } else {
                $refNumber = 'LM' . str_pad($target_entry->id + 1, 8, "0", STR_PAD_LEFT);
            }


            try
            {
                $payment_intent = \Stripe\PaymentIntent::create([
                    'amount' => (float)$totalamount * 100,
                    'currency' => 'GBP',
                    'description' => 'Payment From SafeEnviro student by '. $name . ' Reference No: '.$refNumber,
                    'payment_method_types' => ['card'],
                ]);

//                Session::put('payment_completed', true);
            }
            catch (ApiErrorException $e)
            {

            }

            $intent = $payment_intent->client_secret;

            Session::put('ref_No', $refNumber);

            return view('credit-card', compact('intent'))->with('total_amount', (float)$totalamount);
        }else {
            return back();
        }

    }

    public function afterPayment(Request $request)
    {

        $secreat_id = '3487';
        if($request->p_Id == $secreat_id) {
            Session::put('payment_completed', true);
        return redirect('/afterCheckout');
        }else{
            return Redirect::to('/enroll');
        }


    }
}
