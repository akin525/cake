<?php


namespace App\Http\Controllers;


use App\Jobs\SendOrderDeliveryNotice;
use App\Mail\MailOrder;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Gateways;
use App\Models\Order;
use App\Models\Payments;
use Faker\Provider\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;


class OrderController
{
function postorder(Request  $request)
{
    $request->validate([

    ]);

    $gateway=Gateways::where('name', 'paystack')->first();
    $pkey=$gateway->pkey;
    $payid = mt_rand(1000000000, 9999999999);
//    $address=Address::where('user_id', $request->name)->first();
//    if (!$address) {
        $address = Address::create([
            'user_id' => $request->name,
            'address_line1' => $request->address,
            'addressc' => $request->addressc,
            'address_line2'=>$request->apartment ?? null,
            'phone' => $request->phone,
            'phonec' => $request->phonec,
            'email' => $request->email,
            'emailc' => $request->emailc,
            'city' => $request->city,
            'cityc' => $request->cityc,
            'namec' => $request->namec,
            'country' => $request->country,
            'countryc' => $request->countryc,
            'state' => $request->countryc,
            'statec' => $request->countryc,
            'postal_code' => $request->postal_code ?? null,
        ]);
//    }
    $cart=Session::get('selected_product', []);
    foreach ($cart as $carts) {
        $order = Order::create([

            'user_id' => $request->name,
            'deliver_time'=>$request->time,
            'deliver_date'=>$request->date,
            'name' => $carts['name'],
            'product_id' => $carts['id'],
            'quantity' => 1,
            'image' => $carts['image'],
            'price' => $carts['amount'],
            'subtotal' => $carts['amount'],
            'status' => 0,
            'topper' => $carts['topper'] ?? null,
            'topperamount' => $carts['topperamount'] ?? null,
            'flavour' => $carts['flavor'] ?? null,
            'layer' => $carts['layers'] ?? null,
            'color' => $carts['color'] ?? null,
            'size' => $carts['size'] ?? null,
            'card' => $carts['cardtext'] ?? null,
            'card_amount' => $carts['card'] ?? null,
            'payid'=>$payid,
            'option'=>$carts['option'],
            'item'=>$carts['item'],

        ]);

    }


    $url = "https://api.paystack.co/transaction/initialize";

    $fields = [
        'email' => $request->email,
        'amount' => $request->amount * 100,
        'reference'=>$payid,
        'callback_url' => $gateway->call_url,
        'metadata' => ["cancel_action" => $gateway->cancel_url]
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
    Session::forget('selected_product');

//    return response()->json($result, Response::HTTP_BAD_REQUEST);

    return response()->json([
        'status'=>'success',
        'url'=>$data['data']['authorization_url'],
        'reference'=>$data['data']['reference'],
    ]);
//    return view('shop.paynow', compact('request', 'payid', 'pkey'))->with('status', 'Kindly Complete your payment');
}


function confirmpayment(Request $request)
{
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
    if ($data['status'] == true){
        $create=Payments::where('transaction_id', $request->reference)->first();
        if ($create){
            return redirect('cart')->with('errors', 'Duplicate Payment');
        }
        $check=Order::where('payid', $request->reference)->first();

//        return $check;
        $put=Payments::create([
            'order_id'=>$request->reference,
            'user_id'=>$check->user_id,
            'name'=>$check->name,
            'amount'=>$amount,
            'payment_method'=>'Paystack',
            'transaction_id'=>$request->reference,
            'narration'=>'payment for cake',
            'status'=>1,
        ]);

//        foreach ($check as $cic){
            $check->pay = 1;
            $check->save();
//        }

        $move=Address::where('user_id', $check->user_id)->first();
        $email=$move->email;
        $or=Order::where('payid', $request->reference)->first();
        $order=Order::where('payid', $request->reference)->get();
        $total=Order::where('payid', $request->reference)->sum('price');
        Mail::to($email)->send(new MailOrder($order,  $total, $or, $move));
        SendOrderDeliveryNotice::dispatch($order, $total, $or, $move,$email)->delay(now()->addMinutes(1));


        return  redirect('home')->with('status', 'Payments Successful');
    }
    return  redirect('home')->with('errors', 'Please contact admin');

}
}
