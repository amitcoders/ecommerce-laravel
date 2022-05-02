<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class WishlistController extends Controller
{
    public function addtowishlist($product_id){
        if(Auth::check()){
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,

            ]);
            return Redirect()->back()->with('cart_message','Product Added to Wishlist');
        }
        else{
            return redirect()->route('login')->with('loginError','At first login in your account');
        }
    }

    public function wishlistpage(){
        $wishlist = Wishlist::where('user_id',Auth::id())->latest()->get();
        return view('pages.wishlist',compact('wishlist'));
    }

    public function destroy($wishlist_id){
        Wishlist::where('id',$wishlist_id)->where('user_id',Auth::id())->delete();
        return Redirect()->back()->with('wishlist_delete','Product Deleted from Wishlist');
    }
}
