<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController
{
    function removefromcart(Request $request)
    {
        if (Auth::user()) {
            $cart = Cart::where('id', $request)->delete();
            $msg = "Product Removed";
        } else {
            $cart = Session::get('selected_product', []);

            // You need to specify which item to remove dynamically
            $itemIndexToRemove = $request->input('item_index');

            // Check if the item exists in the cart
            if (isset($cart[$itemIndexToRemove])) {
                // Unset the item from the cart array
                unset($cart[$itemIndexToRemove]);

                // Update the session with the modified cart array
                Session::put('selected_product', $cart);
                $msg = "Product Removed from Cart";
            } else {
                $msg = "Item not found in Cart";
            }
        }

        return response()->json([
            'status' => 1,
            'message' => $msg,
        ]);
    }
function clearcart()
{

        $msg = "Cart clear Successful";
        Session::forget('selected_product');


    return response()->json([
        'status'=>1,
        'message'=>$msg,
    ]);
}

}
