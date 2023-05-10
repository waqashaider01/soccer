<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
// use Stripe\Charge;
use Stripe\PaymentIntent;
// use \App\Http\Controllers\Stripe
use Session;
use Exception;
use App\Models\Sub;
use App\Models\Country;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\BillingAdress;
use App\Models\PaymentCardInfo;
use Illuminate\Support\Facades\Crypt;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }
    //===================================================
    public function index(Request $request)
    {
        $durations = $request->route('duration_id');
        $plan = $request->route('plan_id');
        if ($plan == 25) {
            $plan = 'price_1LgQdGIXnsc4E3tGFBL6Uw5h';
        } elseif ($plan == 60) {
            $plan = 'price_1LgQdGIXnsc4E3tGcY5JvWFs';
        } elseif ($plan == 90) {
            $plan = 'price_1LgQdGIXnsc4E3tGHIibTmXs';
        } elseif ($plan == 120) {
            $plan = 'price_1LgQdGIXnsc4E3tGOIq2Ouem';
        } else {
            $plan = '0';
        }

        if($durations == 1){
            $durations = 1;
        }
        elseif($durations == 3){
            $durations = [1,3];
        }
        elseif($durations == 6){
            $durations = [1,3,6];
        }
        elseif($durations == 12){
            $durations = [1,3,6,12];
        }else{
            0;
        }

        $price = $request->plan_id;
        $duration_month = $request->route('duration_id');

        $planId = $request->route('plan_id');
        $intent = Auth::user()->createSetupIntent();


        $countries = Country::all();
        return view(
            'frontend.subscription.create',
            compact('plan', 'countries', 'intent', 'planId','durations','price','duration_month')
        );
    }


    public function createSubscription(Request $request)

    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $customer = \Stripe\Customer::create(array(
        "address" => [
                "line1" => "Virani Chowk",
                "postal_code" => "360001",
                "city" => "Rajkot",
                "state" => $request->state,
                "country" => $request->country,
            ],
                "email" => Auth::user()->email,
                "name" => Auth::user()->name,
                "source" => $request->stripeToken
        ));

        $data = \Stripe\Charge::create ([
                "amount" => ($request->price * $request->sub_plan) * 100,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Payment from Soccer",
                "shipping" => [
                "name" => "Jenny Rosen",
                "address" => [
                    "line1" => "510 Townsend St",
                    "postal_code" => "98140",
                    "city" => "San Francisco",
                    "state" => "CA",
                    "country" => "US",
                ],
            ]
        ]);


        $user = Auth::user();
            if ($user->type == 'player') {
                $subscription = 'Player Subscription';
            } elseif ($user->type == 'scout') {
                $subscription = 'Scout Subscription';
            } elseif ($user->type == 'club') {
                $subscription = 'Club Subscription';
            } elseif ($user->type == 'coach') {
                $subscription = 'Coach Subscription';
            } elseif ($user->type == 'intermediary') {
                $subscription = 'Intermediary Subscription';
            } elseif ($user->type == 'academy') {
                $subscription = 'Academy Subscription';
            } else {
                $subscription = 'Subscription';
            }

            $sub = new Subscription;

            $Paymentdata = $request->Payment_method;
            $formattedData = ucwords(str_replace("_", " ", $Paymentdata));

            $sub->user_id    = $user->id;
            $sub->name       = $user->name;
            $sub->stripe_id  = $customer->id;
            $sub->stripe_status = 1;
            $sub->stripe_plan   = $request->sub_plan;
            $sub->one_payment_of = $request->price * $request->duration;
            $sub->paid_amount = $request->price * $request->sub_plan;
            $sub->recurring_amount   = $sub->stripe_plan * $request->price;
            $sub->quantity      = 1;
            $sub->card_no = Crypt::encryptString($request->card_no);
            $sub->cvc = $request->cvc;
            $sub->expiration_date = $request->exp_month. '/' .$request->exp_year;
            $sub->payment_method = $formattedData;
            $sub->trial_ends_At = Carbon::now();
            if($sub->stripe_plan == 1) {
            $sub->ends_at = Carbon::now()->addMonth();
            } elseif($sub->stripe_plan == 3){
                $sub->ends_at = Carbon::now()->addMonths(3);
            } elseif($sub->stripe_plan == 6){
                $sub->ends_at = Carbon::now()->addMonths(6);
            } else {
                $sub->ends_at = Carbon::now()->addYear();
            }
            $shipping_address = $data->shipping->address;
            $save = $sub->save();
            $address = new BillingAdress();
            $address->user_id = $user->id;
            $address->subscription_id = $sub->id;
            $address->postal_code = $shipping_address->postal_code;
            $address->city = $shipping_address->city;
            $address->state = $shipping_address->state;
            $address->country = $shipping_address->country;

            $save = $address->save();


            if ($save) {
                Session::flash('success', 'Payment successful!');
                return back();
            } else {
                dd('error occured');
            }

        $user->newSubscription($subscription, $request['plan'])->create($request['paymentMethod'], [
            'email' => $user->email,
        ]);

        return redirect()->route(Auth::user()->type . '.subscriptions')->with('success', 'Subscription is completed.');
    }

    //===================================================
    public function subscriptionDetails()
    {
        $user = Auth::user();
        $subscriptions = $user->subscriptions;
        if (auth()->user()->type == 'player') {
            return view('backend.player.subscriptions', compact('subscriptions'));
        } else {
            return view('backend.agent.subscriptions', compact('subscriptions'));
        }
        
        dd('test');
    }


    //===================================================
    public function cancelSubscription($name)
    {
        $user = Auth::user();
        $user->subscription($name)->cancel();
        return redirect()->back()->with('success', 'Subscription is cancelled.');
    }


    //===================================================
    public function show()
    {
        return view('frontend/subscription/subscribe');
    }

    //===================================================
    public function notshow()
    {
        return redirect('/');
    }

    //===================================================
    public function store(Request $request)
    {
        $subs = new Sub;
        $status = 1;
        $data = array(
            "duration" => $request->duration,
            "price" => $request->price,
            "status" => $status,
        );

        $subs->create($data);
        return redirect('/admin/showpricing');
    }


    //===================================================
    public function update(Request $request, $id)
    {
        $subs = Sub::find($id);
        $data = array(
            "duration" => $request->duration,
            "price" => $request->price,
            "status" => $request->status,
        );

        $subs->update($data);
        return redirect('admin/adminsetting');
    }


    //===================================================
    public function delete($id)
    {
        $sub = Sub::find($id);
        $sub->delete();
        return redirect()->back();
    }

    public function saveDetails(Request $request)

    {
        $id = Auth::user()->id;
        $save = PaymentCardInfo::create([
            'user_id' => $id,
            'card_no' => Crypt::encryptString($request->card_no),
            'cvc' => $request->cvc_no,
            'expiry_month' => $request->expiry_month,
            'expiry_year' => $request->year,
            'card_name' => $request->card_name,
        ]);

        return back()->with('success','Card details added successfully!');
    }
}
