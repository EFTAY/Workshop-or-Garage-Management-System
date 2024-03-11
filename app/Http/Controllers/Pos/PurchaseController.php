<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    public function purchaseView()
    {
        try {
            $purchase_data = Purchase::orderBy('date', 'DESC')->orderBy('id', 'DESC')->get();
            return view('admin.purchase.view', compact('purchase_data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function purchaseAdd()
    {
        try {
            $suppliers = Supplier::all();
            $categories = Category::all();
            $units = Unit::all();
            return view('admin.purchase.add', compact('suppliers', 'categories', 'units'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function purchaseStore(Request $request)
    {
        try {

            $request->validate([
                'date' => 'required',
                'product_id' => 'required',
                'supplier_id' => 'required',
                'buying_qty' => 'required',
                'unit_price' => 'required',
                'buying_price' => 'required',
                'status' => 'required',
            ]);
            $purchase = new Purchase();
            $purchase->date = $request->date;
            $purchase->product_id = $request->product_id;
            $purchase->supplier_id = $request->supplier_id;
            $purchase->buying_qty = $request->buying_qty;
            $purchase->unit_price = $request->unit_price;
            $purchase->buying_price = $request->buying_price;
            $purchase->status = $request->status;
            $purchase->save();
            return redirect()->route('purchase.view')->with('success', 'Purchase Added Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
