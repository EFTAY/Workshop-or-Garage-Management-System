<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplierView()
    {

        $suppliers = Supplier::all();
        // return $suppliers;
        return view('admin.supplier.view', compact('suppliers'));
    }
    public function supplierAdd()
    {
        return view('admin.supplier.add');
    }
    public function supplierStore()
    {
        try {
            $supplier = Supplier::create([
                'name' => request()->name,
                'email' => request()->email,
                'mobile_no' => request()->mobile_no,
                'address' => request()->address,
                'status' => request()->status,
            ]);
            $notification = array(
                'message' => 'Supplier Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('supplier.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function supplierEdit()
    {
        // try {
        //     $supplier = Supplier::create([
        //         'name' => request()->name,
        //         'email' => request()->email,
        //         'mobile_no' => request()->mobile_no,
        //         'address' => request()->address,
        //         'status' => request()->status,
        //     ]);
        //     $notification = array(
        //         'message' => 'Supplier Deleted Successfully',
        //         'alert-type' => 'success'
        //     );
        //     return redirect()->back()->with($notification);
        //     return redirect()->route('supplier.view')->with('success', 'Supplier Added Successfully');
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
    }
    // delete fucntion
    public function supplierDelete($id)
    {
        try {
            $supplier = Supplier::find($id);
            $supplier->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
