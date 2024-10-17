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


        // Validate the request to ensure 'id' is provided
        $request->validate([
            'id' => 'required|integer',
        ]);

        // Retrieve the cart from the session
        $cart = Session::get('selected_product', []);

        // Get the product ID from the request
        $productId = (int) $request->id;
//        return response()->json($productId, Response::HTTP_BAD_REQUEST);

        // Filter out the product with the given ID from the cart
        $cart = array_filter($cart, function ($item) use ($productId) {
            return (int) $item['id'] !== $productId;
        });

        // Re-index the cart to avoid gaps in the keys
        $cart = array_values($cart);

        // Update the session with the modified cart, or clear the cart if empty
        if (empty($cart)) {
            Session::forget('selected_product'); // Clear the cart if it's empty
            $msg = "Cart is now empty.";
        } else {
            Session::put('selected_product', $cart); // Update session with modified cart
            $msg = "Product Removed from Cart";
        }

        // Return a JSON response indicating success
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
