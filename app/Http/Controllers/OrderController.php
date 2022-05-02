<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Cart;
use Illuminate\Support\Facades\Log;
use App\Shipping;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function storeorder(Request $request)
    {

        $request->validate([
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
        ]);

        $order_id = Order::insertGetId([
             
            'user_id,' => Auth::id(),
            'invoice_no'=> mt_rand(100000, 999999),
            'payment_type' => $request->payment_type,
            'total' => $request->total,
            'subtotal' => $request->subtotal,
            'coupon_discount' => $request->coupon_discount,
            'created_at'=> Carbon::now(),
        ]);

        $carts = Cart::where('user_ip', request()->ip())->latest()->get();

        foreach($carts as $cart){
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'product_qty' => $cart->qty,
                'created_at'=> Carbon::now(),
            ]);
        }

        Shipping::insert([
            'order_id' => $order_id,
            'shipping_first_name' => $request->shipping_first_name,
            'shipping_last_name' => $request->shipping_last_name,
            'address' => $request->address,
            'shipping_phone' => $request->shipping_phone,
            'shipping_email' => $request->shipping_email,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'created_at'=> Carbon::now(),
        ]);

        if(Session::has('coupon')){
            session()->forget('coupon');
            
        }

        Cart::where('user_ip', request()->ip())->delete();

        return redirect()->back()->with('order_complete', 'Order placed successfully!');

        

    }
}
