<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request){
        $categories = new Category();
        $categories->category_name = $request->category_name;
        $categories->save();
        return redirect('/admin/category')->with('success','Category added Successfully');
    }

    public function edit($id)
    {
        $amit = Category::find($id);
        return view('admin.category.edit',compact('amit'));
    }

    public function update(Request $request)
    {
        $categories = Category::find($request->id);
        $categories->category_name = $request->category_name;
        $categories->status = $request->status;
        $categories->update();
        return redirect('/admin/category')->with('success','Category Updated Successfully');
    }

    public function delete($id){
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

    public function inactive($id){
        Category::find($id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Category Inactive Successfully');
    }
    public function active($id){
        Category::find($id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Category Active Successfully');
    }


}
