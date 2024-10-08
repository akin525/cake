<?php

namespace App\Http\Controllers;

use App\Mail\MailCart;
use App\Mail\register;
use App\Models\Address;
use App\Models\Alert;
use App\Models\Attribute;
use App\Models\Cart;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Cheff;
use App\Models\Colors;
use App\Models\FQ;
use App\Models\Homepage;
use App\Models\Items;
use App\Models\Layers;
use App\Models\Message;
use App\Models\Option;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Rtb;
use App\Models\Settings;
use App\Models\Sizes;
use App\Models\State;
use App\Models\Topper;
use App\Models\User;
use App\Models\Variation;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController
{

    function logincheck(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'number'=>'required',
        ]);
        $check=User::where('email', $request->email)->first();
        if ($check){
            Auth::login($check);

            return redirect(RouteServiceProvider::HOME);
        }
        $user = User::create([
            'name' => $request->name,
            'number' => $request->number,
            'address' => "check address",
            'email' => $request->email,
            'password' => Hash::make('12345678'),
        ]);

        $email=$request->email;
        Mail::to($email)->send(new register($user));

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
function landingpage()
{
    $product=Products::where('status', 1)
        ->orderBy('id', 'DESC')
        ->limit(12)->get();

    $latest=Products::where('status', 1)
        ->orderBy('id', 'DESC')->first();

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
            $category=Categories::orderBy('id', 'DESC')->get();

//            return $cartsum;
            $setting=Settings::first();
            $hot=Products::where('cool', 'hots')->get();
            $fq=FQ::all();
            $page=Homepage::where('status', 1)->first();
            if ($page->page == 01){
                return view('welcome', compact('product',
                    'product1', 'page', 'setting', 'fq', 'hot', 'latest', 'category', 'cartsum', 'cart'));
            }elseif ($page->page == 02){
                return view('homepage1', compact('product',
                    'product1', 'page', 'setting', 'hot', 'fq', 'latest', 'category', 'cartsum', 'cart'));
            }elseif ($page->page == 03){
                return view('homepage2', compact('product',
                    'product1', 'setting', 'page', 'hot', 'fq', 'latest', 'category', 'cartsum', 'cart'));
            }

}
function landingpage1()
{
    $product=Products::where('status', 1)
        ->orderBy('id', 'DESC')
        ->limit(12)->get();

    $latest=Products::where('status', 1)
        ->orderBy('id', 'DESC')->first();

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
            $fq=FQ::all();
            $page=Homepage::where('status', 1)->first();

                return view('newhomepage', compact('product',
                    'product1', 'page', 'setting', 'fq', 'hot', 'latest', 'category', 'cartsum', 'cart'));

}
function aboutus()
{
    $setting=Settings::first();
    $fq=FQ::all();

    if (Auth::user()) {
        $cartsum = Cart::where('user_id', Auth::user()->id)->sum('amount');
        $cart=Cart::where('user_id', Auth::user()->id)->get();

    }else{
        $cartsum=0;
        $cart=null;
    }
    $category=Categories::all();

    return view('about', compact('setting', 'fq',  'category', 'cartsum', 'cart'));
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
    $fq=FQ::all();
    $pop=Products::where('cool', 'hots')->orderBy('id', 'DESC')
        ->limit(4)
        ->get();
    if (Auth::user()) {
        $cartsum = Cart::where('user_id', Auth::user()->id)->sum('amount');
        $cart=Cart::where('user_id', Auth::user()->id)->get();

    }else{
        $cartsum=0;
        $cart=null;
    }
    $category=Categories::all();

    return view('shop.cake', compact('product', 'fq', 'category', 'cart', 'cartsum', 'pop'));
}
function cakedetail($request)
{
    $product = Products::with('categories', 'variations.options')->findOrFail($request);

//    return $product;
    $done=Categories::where('name', $product->category)->first();

//    $done1=Category::where('products_id', $product->id)->get();

    $product1=Products::where('status', 1)->limit(9)->get();
    $color=Colors::all();
    $layer=Attribute::where('product_id', $product->id)
        ->where('name', 'layers')->first();
    $size=Attribute::where('product_id', $product->id)
        ->where('name', 'Sizes')->first();
    $flavor=Attribute::where('product_id', $product->id)
        ->where('name', 'Flavor')->first();
    $layeralert=Alert::where('name', 'layers')->first();
    $addalert=Alert::where('name', 'addition')->first();
    $option=Option::all();
    $items=Items::where('products_id', $product->id)->get();
    $rtg=Topper::where('name', '!=', 'Customized Topper')->get();
    $topper=Topper::get();

//    return $size;
    if (Auth::user()) {
        $cartsum = Cart::where('user_id', Auth::user()->id)->sum('amount');
        $cart=Cart::where('user_id', Auth::user()->id)->get();

    }else{
        $cartsum=0;
        $cart=null;
    }
    $category=Categories::all();

    return view('shop.cakedetails', compact('product', 'product1',
    'cart', 'cartsum', 'category', 'color', 'rtg', 'topper', 'layer', 'size', 'layeralert', 'done', 'addalert', 'flavor', 'option', 'items'
    ));

}
    function addCart(Request  $request)
    {
//
//        return $request;
        $validate=$request->validate([
            'id'=>'required',
            'amount'=>'required',
        ]);

        $product = Products::find($request->id);
        if ($product) {
            $productDetails1= Session::get('selected_product', []);
            $productDetails = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
//                'flavor' => $request->flavor ??null,
//                'size' => $request->size ?? null,
//                'layers' => $request->layers ?? null,
            'attribute'=>$request->attributes,
                'amount' => $request->amount,
                'color' => $request->color ?? null,
                'topper' => $request->topperText ?? null,
                'topperamount' => $request->topper ?? null,
                'addition' => $request->addition ?? null,
                'card' => $request->card ?? null,
                'cardtext' => $request->ekoCakesMessage ?? null,
                'option' => $request->option ?? null,
                'item' => $request->item ?? null,
            ];
            $productDetails1[] = $productDetails;

            Session::put('selected_product', $productDetails1);
            return redirect('cart');

        }


//        if (Auth::check()) {
//            $insert = Cart::create([
//                'user_id' => Auth::user()->id,
//                'product_id' => $request->id,
//                'quantity' => 1,
//                'name' => $product->name,
//                'amount' => $request->amount,
//                'image' => $product->image,
//                'color'=>$request->color ?? null,
//                'size'=>$request->size,
//                'flavour'=>$request->flavor,
//                'layer'=>$request->layers,
//                'card'=>$request->ekoCakesMessage ?? null,
//                'topper'=>$request->topper ?? null,
//                'topper_text'=>$request->topperText ?? null,
//                'addition'=>$request->addition ?? null,
//                'message'=>$request->message ?? null,
//            ]);
//            $email=Auth::user()->email;
//            $input=Cart::where('user_id', Auth::user()->id)->get();
//            $amount=Cart::where('user_id', Auth::user()->id)->sum('amount');
//            Mail::to($email)->send(new MailCart($input,  $amount));
//
//            $message = "Added To Cart Successfully!";
//            return redirect('cart')->with('status', $message);
//
//
//        } else {
//
//            $message = "Added To Cart Successfully!";
//
//            return redirect('login');
//        }


    }


    function addCart1(Request $request)
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

    $cart = Session::get('selected_product', []);
    $cartsum = 0;

    $category=Categories::all();
    foreach ($cart as $item) {
        $amount = isset($item['amount']) ? $item['amount'] : 0;
        // Debugging: Print out individual amounts
//        echo "Amount for item: " . $amount . "<br>";

        $cartsum += (float) $amount;
    }
//    return $cart;
    return view('shop.cart', compact('cart', 'category', 'cartsum'));
}

function category($request)
{
 $categorys = Categories::findOrFail($request);
//return $category;
    // Retrieve product IDs associated with the category
    $productIds = $categorys->products->pluck('id');

    // Retrieve products using the collected IDs and paginate them
    $product = Products::whereIn('id', $productIds)
        ->orderBy('id', 'DESC')
        ->paginate(12);
//    return $product;

    $category=Categories::all();
    $done=Categories::where('id', $request)->first();
    $fq=FQ::all();
    $pop=Products::where('cool', 'hots')->orderBy('id', 'DESC')
        ->limit(4)
        ->get();
    return view('shop.category', compact('category','product', 'fq', 'pop', 'done'));
}

function searccakeh(Request $request)
{
    $product=Products::where([['name', 'like', '%'.$request->name.'%']])
        ->orderBy('id', 'DESC')
        ->paginate('12');
    $category=Categories::all();
    $fq=FQ::all();
    $pop=Products::where('cool', 'hots')->orderBy('id', 'DESC')
        ->limit(4)
        ->get();
    return view('shop.search', compact('category','product', 'fq', 'pop'));
}
function checkout()
{

        $checkout=0;
        $cart = session::get('selected_product', []);
        $alert=Alert::where('name', '=', 'RTG')->first();
        $alert1=Alert::where('name', '=','Other')->first();

    $category=Categories::all();
    foreach ($cart as $item) {
        $amount = isset($item['amount']) ? $item['amount'] : 0;
        $checkout += (float) $amount;
    }
    return view('shop.checkout', compact('checkout', 'category', 'cart', 'alert', 'alert1'));
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
        $pop=Products::where('cool', 'hots')->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        return view('shop.rtb', compact('product', 'category', 'pop'));
    }
    function getlayer()
    {
        $find=Attribute::where('name', 'layers')->first();
        return response()->json($find->value);
    }
    function getsize(Request $request)
    {
        $size = $request->input('size');
        $layers = $request->input('layers');
        $flavor = $request->input('flavor');
        $find=Variation::where('attribute_size', $size)
            ->where('attribute_layer', $layers)
            ->where('attribute_flavor', $flavor)
            ->first();
        return response()->json($find->price);
    }
    function getflavor()
    {
        $find=Attribute::where('name', 'Flavor')->first();
        return response()->json($find->value);
    }

    function message(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'name'=>'required',
            'number'=>'required',

        ]);

        $mess=Message::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'number'=>$request->number,
            'content'=>$request->message ?? null,
            'address'=>$request->address ?? null,
        ]);
        $msg="Message Receive Successfully";

        return response()->json([
            'status'=>'success',
            'message'=>$msg,
        ]);

    }
}
