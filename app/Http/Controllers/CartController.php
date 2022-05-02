<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
    }

    public function addtocart(Request $request, $product_id)
    {

        $check = Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->first();
        if ($check) {
            Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->increment('qty');
            return redirect()->back()->with('cart', 'Product added to cart successfully!');
        } else {
            Cart::insert([
                'product_id' => $product_id,
                'qty' => 1,
                'price' => $request->price,
                'user_ip' => $request->ip()
            ]);
            return redirect()->back()->with('cart', 'Product Added to Cart Successfully');
        }
    }

    public function cartpage()
    {
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function ($t) {
            return $t->price * $t->qty;
        });
        return view('pages.cart', compact('carts', 'subtotal'));
    }

    public function destroy($cart_id)
    {
        Cart::where('id', $cart_id)->where('user_ip', request()->ip())->delete();
        return redirect()->back()->with('cart_delete', 'Product removed Successfully');
    }

    public function quantityupdate(Request $request, $cart_id)
    {
        Cart::where('id', $cart_id)->where('user_ip', request()->ip())->update([
            'qty' => $request->qty,
        ]);
        return redirect()->back()->with('cart_update', 'Product Quantity Updated Successfully');
    }

    //--- coupon applied
    public function applycoupon(Request $request)
    {
       $check = Coupon::where('coupon_name',$request->coupon_name)->first();
       
       if($check){
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function ($t) {
            return $t->price * $t->qty;
        });
           Session::put('coupon',[
                'coupon_nmae' => $check->coupon_name,
                'coupon_discount' => $check->discount,
                'discount_amount' => $subtotal * ($check->discount/100),   
              ]);   //--- session store
              return redirect()->back()->with('coupon_applied', 'Coupon Applied Successfully');
       }else{
           return redirect()->back()->with('coupon_applied', 'Coupon Not Applied');
       }
    }

    public function couponremove()
    {
        if(Session::has('coupon')){
            session()->forget('coupon');
            return redirect()->back()->with('coupon_remove', 'Coupon Removed Successfully');
        }
    }
}
