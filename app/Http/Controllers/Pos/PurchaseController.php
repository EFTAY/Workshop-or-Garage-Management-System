<?php

namespace App\Http\Controllers\Pos;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchaseView()
    {
        try {
            // $purchase_data = Purchase::orderBy('date', 'ASC')->orderBy('id', 'ASC')->get();
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
            // return $request;

            if ($request->category_id == null) {
                $notification = array(
                    'message' => 'Sorry you do not select any item',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            } else {
                $count_category = count($request->category_id);
                for ($i = 0; $i < $count_category; $i++) {
                    $purchase = new Purchase();
                    $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                    $purchase->purchase_no = $request->purchase_no[$i];
                    $purchase->supplier_id = $request->supplier_id[$i];
                    $purchase->category_id = $request->category_id[$i];
                    $purchase->product_id = $request->product_id[$i];
                    $purchase->buying_quantity = $request->buying_quantity[$i];
                    $purchase->unit_price = $request->unit_price[$i];
                    $purchase->buying_price = $request->buying_price[$i];
                    $purchase->description = $request->description[$i];
                    $purchase->created_by = Auth::user()->id;
                    $purchase->status = '0';
                    $purchase->save();
                }
            }

            $notification = array(
                'message' => 'Data Save Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('purchase.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //purchaseDelete

    public function purchaseDelete($id)
    {
        try {
            $purchase = Purchase::where('id', $id)->first();
            if ($purchase) {
                $purchase->delete();
                $notification = array(
                    'message' => 'Purchase Item Deleted Successfully',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Purchase Item Not Found',
                    'alert-type' => 'error'
                );
            }
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //purchasePending
    public function purchasePending()
    {
        try {
            $purchase_data = Purchase::orderBy('date', 'DESC')->orderBy('id', 'DESC')->where('status', '0')->get();
            return view('admin.purchase.pending', compact('purchase_data'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    //purchaseApprove
    public function purchaseApprove($id)
    {
        try {
            // $purchase = Purchase::where('id', $id)->first();
            $purchase = Purchase::find($id);
            $product = Product::where('id', $purchase->product_id)->first();
            $purchase_qty = ((float)($product->quantity)) + ((float)($purchase->buying_quantity));
            $product->quantity = $purchase_qty;
            if ($product->save()) {
                Purchase::where('id', $id)->update(['status' => '1']);
                $notification = array(
                    'message' => 'Status Approved Successfully',
                    'alert-type' => 'success'
                );
            } else {
                $notification = array(
                    'message' => 'Status Not Found',
                    'alert-type' => 'error'
                );
            }
            return redirect()->route('purchase.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
