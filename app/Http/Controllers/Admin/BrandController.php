<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{

    public function _construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->status = $request->status;
        $brands->save();
        return redirect('/admin/brand')->with('success', 'Brand Added Successfully');
    }

    public function edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function delete($id){
        $brands = Brand::find($id);
        $brands->delete();
        return redirect('/admin/brand')->with('success', 'Brand Deleted Successfully');
    }

    public function update(Request $request){
        $brands = Brand::find($request->id);
        $brands->brand_name = $request->brand_name;
        $brands->status = $request->status;
        $brands->update();
        return redirect('/admin/brand')->with('success', 'Brand Updated Successfully');
    }

    public function inactive($id){
        Brand::find($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Category Inactive Successfully');
    }
    public function active($id){
        Brand::find($id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Category Active Successfully');
    }

    



}
