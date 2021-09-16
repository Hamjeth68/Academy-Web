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

            $error_message = null;

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
            catch(\Stripe\Exception\CardException $e) {
                // Since it's a decline, \Stripe\Exception\CardException will be caught
                $error_message = $e->getError()->message;
            } catch (\Stripe\Exception\RateLimitException $e) {
                // Too many requests made to the API too quickly
                $error_message = $e->getError()->message;
            } catch (\Stripe\Exception\InvalidRequestException $e) {
                // Invalid parameters were supplied to Stripe's API
                $error_message = $e->getError()->message;
            } catch (\Stripe\Exception\AuthenticationException $e) {
                // Authentication with Stripe's API failed
                // (maybe you changed API keys recently)
                $error_message = $e->getError()->message;
            } catch (\Stripe\Exception\ApiConnectionException $e) {
                // Network communication with Stripe failed
                $error_message = $e->getError()->message;
            } catch (\Stripe\Exception\ApiErrorException $e) {
                // Display a very generic error to the user, and maybe send
                // yourself an email
                $error_message = $e->getError()->message;
            } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe
                $error_message = 'Something went wrong';
            }

            if (!is_null($error_message))
            {
                return back()->with('error', $error_message);
            }
            else
            {
                $intent = $payment_intent->client_secret;

                Session::put('ref_No', $refNumber);

                return view('credit-card', compact('intent'))->with('total_amount', (float)$totalamount);
            }

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
