<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function supplierView()
    {
        try {
            $supplier = Supplier::all();

            return view('admin.supplier.view', compact('supplier'));
        } catch (\Throwable $th) {
            // Log the error or handle it as needed
            $notification = [
                'message' => 'Error fetching suppliers',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function supplierAdd()
    {
        return view('admin.supplier.add');
    }
    public function supplierStore(Request $request, $id)
    {
        try {
            // $createdByName = User::find($supplier->created_by)->name;
            $supplier = Supplier::create([
                'name' => request()->name,
                'email' => request()->email,
                'mobile_no' => request()->mobile_no,
                'address' => request()->address,
                'status' => request()->status,
                'created_by' => Auth::user()->name,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Supplier Added Successfully',
                'alert-type' => 'success'
            );
            // return redirect()->route('supplier.view')->with($notification);
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function supplierEdit($id)
    {

        $supplier = Supplier::find($id);
        return view('admin.supplier.edit', compact('supplier'));
    }
    public function supplierUpdate(Request $request)
    {
        try {
            // return $request;
            $supplier = $request->id;

            // Update supplier attributes with values from the request
            Supplier::where('id', $supplier)->update([
                'name' => request()->name,
                'email' => request()->email,
                'mobile_no' => request()->mobile_no,
                'address' => request()->address,
                'status' => request()->status,
                'updated_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
            ]);

            // Set success notification
            $notification = [
                'message' => 'Supplier Updated Successfully',
                'alert-type' => 'success'
            ];

            // Redirect back with the notification
            // return redirect()->route('supplier.view')->with($notification);
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            // Handle the exception as needed (e.g., log the error)
            $notification = [
                'message' => 'Error updating supplier',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
    }

    public function supplierDelete($id)
    {
        try {
            $supplier = Supplier::find($id);

            if (!$supplier) {
                // Handle the case where the supplier is not found, e.g., return a response or throw an exception.
                $notification = [
                    'message' => 'Supplier not found',
                    'alert-type' => 'error'
                ];

                return redirect()->back()->with($notification);
            }

            $supplier->delete();

            // Set success notification
            $notification = [
                'message' => 'Supplier deleted successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            // Log the error or handle it as needed
            $notification = [
                'message' => 'Error deleting supplier',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }
}
