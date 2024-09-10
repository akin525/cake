<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController
{
    function removefromcart(Request $request)
    {
//        return response()->json($request, Response::HTTP_BAD_REQUEST);

        // Validate the request to ensure 'id' is present
        $validate = $request->validate([
            'id' => 'required',
        ]);

        // Get the cart from the session
        $cart = Session::get('selected_product', []);

        // Convert request id to match product id type
        $productId = $request->id;

        // Filter the cart to remove the product with the specified id
        $cart = array_filter($cart, function ($item) use ($productId) {
            // Ensure both values are compared as integers (or as strings if needed)
            return (int) $item['id'] !== (int) $productId;
        });

//        return response()->json($cart, Response::HTTP_BAD_REQUEST);

        // Re-index the cart to avoid gaps in the keys
        $cart = array_values($cart);

        // Update the session with the modified cart
        Session::put('selected_product', $cart);
        $msg = "Product Removed from Cart";

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
