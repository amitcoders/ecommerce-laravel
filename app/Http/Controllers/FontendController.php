<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FontendController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->latest()->get();
        $categories = Category::where('status',1)->get();
        $get_product = Product::where('status',1)->latest()->limit(3)->get();
        return view('pages.index',compact('categories','products','get_product'));
    }

    public function productdetails($product_id){
        $product = Product::findorfail($product_id);
        $category_id = $product->category_id;
        $related_p = Product::where('category_id',$category_id)->where('id','!=',$product_id)->latest()->get();
       return view('pages.product_details',compact('product','related_p'));    }

}
