<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Image;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products', 'categories', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_code' => 'required',
            'price' => 'required',
            'product_quantity' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image_one' => 'required | mimes:jpeg,jpg,png',
            'image_two' => 'required | mimes:jpeg,jpg,png',
            'image_three' => 'required | mimes:jpeg,jpg,png',
        ],[
            'category_id.required' => 'Please select a category',
            'brand_id.required' => 'Please select a brand',
        ]);
        $imag_one = $request->file('image_one');
        $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
        $image_one = $imag_one->move(public_path('images/products'), $name_gen);
        $img_url1 = $name_gen;

        $imag_two = $request->file('image_two');
        $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
        $image_two = $imag_two->move(public_path('images/products'), $name_gen);
        $img_url2 = $name_gen;

        $imag_three = $request->file('image_three');
        $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
        $image_three = $imag_three->move(public_path('images/products'), $name_gen);
        $img_url3 = $name_gen;
        
        Product::insert([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => str_replace(' ','-',$request->product_name),
            'product_code' => $request->product_code,
            'price' => $request->price,
            'product_quantity' => $request->product_quantity,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image_one' => $img_url1,
            'image_two' => $img_url2,
            'image_three' => $img_url3,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success', 'Product added successfully');
    }

    public function manageProduct(){
        $products = Product::orderBy('id','desc')->get();
        return view('admin/product/manage_product', compact('products'));
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.edit_product', compact('product', 'categories', 'brands'));
    }

    public function updateProduct(Request $request){
        
       $products = Product::findOrFail($request->id);
         $products->category_id = $request->category_id;
            $products->brand_id = $request->brand_id;
            $products->product_name = $request->product_name;
            $products->product_slug = str_replace(' ','-',$request->product_name);
            $products->product_code = $request->product_code;
            $products->price = $request->price;
            $products->product_quantity = $request->product_quantity;
            $products->short_description = $request->short_description;
            $products->long_description = $request->long_description;
            $products->updated_at = Carbon::now();
            if($request->hasFile('image_one')){
                $imag_one = $request->file('image_one');
                $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
                $image_one = $imag_one->move(public_path('images/products'), $name_gen);
                $img_url1 = $name_gen;
                $products->image_one = $img_url1;
            }

            if($request->hasFile('image_two')){
                $imag_two = $request->file('image_two');
                $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
                $image_two = $imag_two->move(public_path('images/products'), $name_gen);
                $img_url2 = $name_gen;
                $products->image_two = $img_url2;
            }

            if($request->hasFile('image_three')){
                $imag_three = $request->file('image_three');
                $name_gen = hexdec(uniqid()).'.'.$imag_three->getClientOriginalExtension();
                $image_three = $imag_three->move(public_path('images/products'), $name_gen);
                $img_url3 = $name_gen;
                $products->image_three = $img_url3;
            }

            $products->update();
            return back()->with('success', 'Product updated successfully');

    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Product deleted successfully');
    }

    public function inactive($id)
    {
        Product::findOrFail($id)->update([
            'status' => 0,
        ]);
        return back()->with('success', 'Product Inactive successfully');
    }

    public function active($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1,
        ]);
        return back()->with('success', 'Product Active successfully');
    }

    
}
