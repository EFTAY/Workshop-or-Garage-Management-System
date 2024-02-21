<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productAdd()
    {
        try {
            $suppliers = Supplier::all();
            $categories = Category::all();
            $units = Unit::all();
            return view('admin.product.add', compact('suppliers', 'categories', 'units'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function productStore(Request $request)
    {
        try {

            Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'unit_id' => $request->unit_id,
                'supplier_id' => $request->supplier_id,
                'quantity' => '0',
                'created_by' => Auth::user()->name,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Product Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function productView()
    {
        try {
            // return Request()->all();

            $products = Product::all();
            return view('admin.product.view', compact('products'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function productEdit($id)
    {
        try {
            $product = Product::find($id);
            $suppliers = Supplier::all();
            $categories = Category::all();
            $units = Unit::all();
            return view('admin.product.edit', compact('product', 'suppliers', 'categories', 'units'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function productUpdate(Request $request)
    {
        try {
            $product = $request->id;
            Product::where('id', $product)->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'unit_id' => $request->unit_id,
                'supplier_id' => $request->supplier_id,
                'updated_by' => Auth::user()->name,
                'updated_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function productDelete($id)
    {
        try {
            Product::find($id)->delete();
            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('product.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
