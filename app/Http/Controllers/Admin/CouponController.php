<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Coupon;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));
    }

    public function store(Request $request)
    {
        $coupons = new Coupon;
        $coupons->coupon_name = strtoupper($request->coupon_name);  
        $coupons->discount = $request->discount;
        $coupons->status = $request->status;
        $coupons->save();
        return redirect()->route('admin.coupon')->with('success','Coupon Created Successfully');
    }

    public function edit($id){
        $coupons = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupons'));
    }

    public function update(Request $request)
    {
        $coupons = Coupon::find($request->id);
        $coupons->coupon_name = strtoupper($request->coupon_name);
        $coupons->status = $request->status;
        $coupons->save();
        return redirect()->route('admin.coupon')->with('success','Coupon Updated Successfully');
    }

    public function delete($id)
    {
        $coupons = Coupon::find($id);
        $coupons->delete();
        return redirect()->route('admin.coupon')->with('success','Coupon Deleted Successfully');
    }

    public function inactive($id){
        Coupon::find($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Category Inactive Successfully');
    }
    public function active($id){
        Coupon::find($id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Category Active Successfully');
    }
    

}
