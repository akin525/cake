<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\Cheff;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Rtb;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController
{

function landingpage()
{
    $product=Products::where('status', 1)
        ->orderBy('id', 'DESC')
        ->limit(10)->get();

        $product1=Products::where('status', 1)
            ->orderBy('id', 'DESC')
            ->limit(9)->get();

//        return $product1;
//            $cheff=Cheff::where('status', 1)
//                ->orderByRaw('updated_at  DESC')
//                ->limit(9)->get();
//            $cart=Session::get('cart', []);
            if (Auth::user()) {
                $cartsum = Cart::where('user_id', Auth::user()->id)->sum('amount');
                $cart=Cart::where('user_id', Auth::user()->id)->get();

            }else{
                $cartsum=0;
                $cart=null;
            }
            $category=Categories::all();

//            return $cartsum;
            $setting=Settings::first();
            $hot=Products::where('cool', 'hots')->get();
            return view('welcome', compact('product',
                'product1', 'setting', 'hot', 'category', 'cartsum', 'cart'));
}
function aboutus()
{
    $setting=Settings::first();
    if (Auth::user()) {
        $cartsum = Cart::where('user_id', Auth::user()->id)->sum('amount');
        $cart=Cart::where('user_id', Auth::user()->id)->get();

    }else{
        $cartsum=0;
        $cart=null;
    }
    $category=Categories::all();

    return view('about', compact('setting', 'category', 'cartsum', 'cart'));
}
function getproduct($request)
{
    $product = Products::findOrFail($request);

    return response()->json($product);
}
function allcake()
{
    $product=Products::where('status', 1)
        ->orderBy('id', 'DESC')
        ->paginate(12);
    if (Auth::user()) {
        $cartsum = Cart::where('user_id', Auth::user()->id)->sum('amount');
        $cart=Cart::where('user_id', Auth::user()->id)->get();

    }else{
        $cartsum=0;
        $cart=null;
    }
    $category=Categories::all();

    return view('shop.cake', compact('product', 'category', 'cart', 'cartsum'));
}
function cakedetail($request)
{
    $product=Products::where('id', $request)->first();
    $product1=Products::where('status', 1)->limit(9)->get();
    if (Auth::user()) {
        $cartsum = Cart::where('user_id', Auth::user()->id)->sum('amount');
        $cart=Cart::where('user_id', Auth::user()->id)->get();

    }else{
        $cartsum=0;
        $cart=null;
    }
    $category=Categories::all();

    return view('shop.cakedetails', compact('product', 'product1',
    'cart', 'cartsum', 'category'
    ));

}
    function addCart($request)
    {
        $product = Products::where('id', $request)->first();

        if (Auth::check()) {
            $insert = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request,
                'quantity' => 1,
                'name' => $product->name,
                'amount' => $product->price,
                'image' => $product->image,
            ]);

            $message = "Added To Cart Successfully!";
        } else {
            $productId = $request;
            $quantity = 1; // Default quantity

            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId] += $quantity;
            } else {
                $cart[$productId] = $quantity;
            }

            session()->put('cart', $cart);
            $message = "Added To Cart Successfully!";
        }

        return response()->json([
            'status' => 'success',
            'message' => $message,
        ]);
    }
    function addCart1($request)
    {
        $product = Products::where('id', $request)->first();

        if (Auth::check()) {
            $insert = Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request,
                'quantity' => 1,
                'name' => $product->name,
                'amount' => $product->price,
                'image' => $product->image,
            ]);

            $message = "Added To Cart Successfully!";
        } else {
            $productId = $request;
            $quantity = 1; // Default quantity

            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId] += $quantity;
            } else {
                $cart[$productId] = $quantity;
            }

            session()->put('cart', $cart);
            $message = "Added To Cart Successfully!";
        }

        return redirect('cart');
    }
function mycart()
{
    if (Auth::user()) {
        $cartsum = Cart::where('user_id', Auth::user()->id)->sum('amount');
        $cart = Cart::where('user_id', Auth::user()->id)->get();
    }else{
        $cartsum=0;
        $cart = [];
        $carts = session()->get('cart', []);

        foreach ($carts as $productId => $quantity) {
            $product = Products::find($productId);
            if ($product) {
                $cartsum += $product->price * $quantity;
                $cart[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'quantity' => $quantity,
                    'amount' => $product->price,
                    'total' => $quantity * $product->price,
                    'image' => $product->image,
                ];

            }
        }

    }
    $category=Categories::all();

//    return $cart;
    return view('shop.cart', compact('cart', 'category', 'cartsum'));
}

function category($request)
{
    $product=Products::where('category', $request)
        ->orderBy('id', 'DESC')
        ->paginate('12');
    $category=Categories::all();

    return view('shop.category', compact('category','product'));
}
function checkout()
{
    if (Auth::user()){
        $checkout=Cart::where('user_id', Auth::user()->id)->sum('amount');
        $cart=Cart::where('user_id', Auth::user()->id)->get();
    }else{
        $checkout=0;
        $cart=[];
        $carts = session()->get('cart', []);

        foreach ($carts as $productId => $quantity) {
            $product = Products::find($productId);
            if ($product) {
                $checkout += $product->price * $quantity;

            } $cart[] = [
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => $quantity,
                'amount' => (int)$product->price,
                'total' => $quantity * $product->price,
                'image' => $product->image,
            ];
        }
    }

    return view('shop.checkout', compact('checkout', 'cart'));
}
function dashboard()
{
    $address=Address::where('user_id', Auth::user()->id)->first();
    $cart=Cart::where('user_id', Auth::user()->id)->get();
    $order=Orders::where('user_id', Auth::user()->id)->get();
    return view('dashboard', compact('address', 'cart', 'order'));
}
    function loadrtb()
    {
        $product= Rtb::orderBy('id', 'DESC')->paginate('9');
        $category=Categories::all();
        return view('shop.rtb', compact('product', 'category'));
    }
}
