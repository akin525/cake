<?php

namespace App\Http\Controllers;

use App\Mail\register;
use App\Models\Plan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MembershioController extends Controller
{

    function loginmembershipindex()
    {
        return view('membership/login');

    }

    function authlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $check=User::where('email', $request->email)
            ->where('password', Hash::make($request->password))
                ->first();
        if ($check){
            Auth::login($check);

            return view('membership/dashboard');
        }


        return redirect('membership/login')->with('error','Your email or password is wrong');

    }

    function myplan()
    {
        $plan=Plan::all();
        return view('membership/myplan', compact('plan'));
    }

    function completeplan($request)
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
}
