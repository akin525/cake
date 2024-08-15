<?php

namespace App\Http\Controllers;

use App\Mail\register;
use App\Models\Cart;
use App\Models\Gateways;
use App\Models\Order;
use App\Models\Orders;
use App\Models\Payments;
use App\Models\Plan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class MembershioController extends Controller
{

    function loginmembershipindex()
    {
        return view('membership/login');

    }

    function mydashboard()
    {
        $myorder=Order::where('user_id', Auth::user()->name)->count();
        $cart=Cart::where('user_id', Auth::user()->id)->count();

        $order=Order::where('user_id', Auth::user()->name)
            ->orderByRaw('updated_at  DESC')
            ->limit(5)->get();
        return view('membership.dashboard', compact('myorder', 'cart', 'order'));
    }

    function authlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('status', 1)
            ->first();

        if (!isset($user) || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->withInput($request->only('email', 'remember'))
                ->with('errors','Invalid credentials ');
        }

            Auth::login($user);

            return redirect('membership/dashboard');

    }

    function myplan()
    {
        $plan=Plan::all();
        return view('membership/myplan', compact('plan'));
    }
    function plandeatail($request)
    {
        $plan=Plan::where('id', $request)->first();
        return view('membership/plandetails', compact('plan'));
    }

    function completeplanwithwallet($request)
    {
        $choose = Plan::where('code', $request)->first();
        $wallet = User::where('username', Auth::user()->username)->first();
        $user = User::where('username', Auth::user()->username)->first();


        if ($wallet->balance < $choose->amount) {
            $mg = "Unable to Choose Membership" . "NGN" . $choose->amount . " from your wallet. Your wallet balance is NGN $wallet->balance. Please Fund Wallet And Retry or Pay Online Using Our Alternative Payment Methods.";

            return response()->json( $mg, Response::HTTP_CONFLICT);

        }
        $gt = $wallet->balance - $choose->amount;
        $wallet->balance = $gt;
        $wallet->save();

        $user->plan = $choose->plan;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Membership completed successfully',
        ]);

    }
    function completeplanwithcard(Request $request)
    {
        $choose = Plan::where('id', $request->id)->first();

        if ($choose) {
            Session::put('chosen_plan_id', $choose->id);

        }
        $wallet = User::where('username', Auth::user()->username)->first();
        $user = User::where('username', Auth::user()->username)->first();

        $gateway=Gateways::where('name', 'paystack')->first();
        $pkey=$gateway->pkey;
        $payid = mt_rand(1000000000, 9999999999);

        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => Auth::user()->email,
            'amount' => $choose->amount * 100,
            'reference'=>$payid,
            'callback_url' => $gateway->member_call,
            'metadata' => ["cancel_action" => $gateway->member_cancel]
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".$gateway->skey,
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
//    return $result;
        $data = json_decode($result, true);

//    return response()->json($result, Response::HTTP_BAD_REQUEST);

        return response()->json([
            'status'=>'success',
            'url'=>$data['data']['authorization_url'],
            'reference'=>$data['data']['reference'],
        ]);

    }

    function verifytransactiion(Request $request)
    {

        $chosenPlanId = session('chosen_plan_id');
        $choose = Plan::where('id', $chosenPlanId)->first();

        $user = User::where('username', Auth::user()->username)->first();

        $gateway=Gateways::where('name', 'paystack')->first();
        $skey=$gateway->skey;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$request->reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".$skey,
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
//             echo $response;
        }
//        return $response;
        $data=json_decode($response, true);
        $amount=$data["data"]["amount"]/100;
        if ($data['status'] == true) {
            $create=Payments::where('transaction_id', $request->reference)->first();
            if ($create){
                $msg="Duplicate Transaction";
                Alert::success('Done', $msg);
                return redirect('membership/dashboard');
            }
            $put=Payments::create([
                'order_id'=>$request->reference,
                'user_id'=>Auth::user()->name,
                'name'=>Auth::user()->name,
                'amount'=>$amount,
                'payment_method'=>'Paystack',
                'transaction_id'=>$request->reference,
                'status'=>1,
                'narration'=>'Payment for Membership plan',
            ]);
            $user->plan = $choose->plan;
            $user->save();

            $msg="Payments for membership plan Successful";
            Alert::success('Done', $msg);
            return  redirect('membership/dashboard');

        }


    }
    function myorder()
    {
        $orders=Order::where('user_id',Auth::user()->name)->get();

        return view('membership.order', compact('orders'));
    }
}
