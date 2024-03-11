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
}
