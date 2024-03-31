<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController
{
function removefromcart($request)
{
    if (Auth::user()) {
        $cart = Cart::where('id', $request)->delete();
        $msg = "Product Removed";
    }else{
        Session::forget('selected_product');


    }
    $msg = "Cart clear Successful";

    return response()->json([
        'status'=>1,
        'message'=>$msg,
    ]);
}
function clearcart()
{
    if (Auth::user()) {
        $cart = Cart::where('user_id', Auth::user()->id)->delete();
        $msg = "Cart clear Successful";
    }else{
        $msg = "Cart clear Successful";
        Session::forget('selected_product');

    }
    return response()->json([
        'status'=>1,
        'message'=>$msg,
    ]);
}

}
