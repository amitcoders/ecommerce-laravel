<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\Log;

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

       
    }
}
