<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use App\Models\Products;

class OrdersController
{
function loadorders()
{
    $order=Order::paginate(20);
    return view('admin.orders', compact('order'));
}
function vieworders($request)
{
    $order=Order::where('id', $request)->first();
    $product=Products::where('id', $order->product_id)->first();

    return view('admin.vieworder', compact('order', 'product'));
}
}
