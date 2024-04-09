<?php

namespace App\Http\Controllers\Pos;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;

class DefaultController extends Controller
{
    public function GetCategory(Request $request)
    {
        try {
            $supplier_id = $request->supplier_id;
            $all_category = Product::with(['category'])->select('category_id')->where('supplier_id', $supplier_id)->groupBy('category_id')->get();

            return response()->json($all_category);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function GetProduct(Request $request)
    {
        try {
            $category_id = $request->category_id;
            $all_product = Product::where('category_id', $category_id)->get();
            return response()->json($all_product);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
