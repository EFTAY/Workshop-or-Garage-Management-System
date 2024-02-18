<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function categoryAdd()
    {
        try {
            return view('admin.category.add');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function categoryStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            Category::create([
                'name' => $request->name,
                // 'status' => request()->status,
                'created_by' => Auth::user()->name,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('category.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function categoryEdit($id)
    {
        try {
            $category = Category::find($id);
            return view('admin.category.edit', compact('category'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function categoryUpdate(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $category = $request->id;

            Category::where('id', $category)->update([
                'name' => $request->name,
                // 'status' => request()->status,
                'updated_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('category.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function categoryDelete($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('category.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function categoryView()
    {
        try {
            $categories = Category::all();
            return view('admin.category.view', compact('categories'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
