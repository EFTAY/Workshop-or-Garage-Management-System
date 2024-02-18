<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function customerView()
    {
        $customer = Customer::all();
        return view('admin.customer.view', compact('customer'));
    }
    public function customerAdd()
    {
        return view('admin.customer.add');
    }
    public function customerStore(Request $request)
    {
        // return $request;

        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required|unique:customers',
            'email' => 'required|unique:customers',
            'address' => 'required',
            'c_image' => 'required',
        ]);
        // composer require intervention/image 
        // Intervention\Image\ImageServiceProvider::class, + config/app.php
        // 'Image' => Intervention\Image\Facades\Image::class
        // php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"
        // https://image.intervention.io/v2/introduction/installation 
        $photo = $request->file('c_image');
        $name_gen = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
        // 25362.png

        Image::make($photo)->resize(200, 200)->save('upload/customer/' . $name_gen);
        $save_url = 'upload/customer/' . $name_gen;

        Customer::create([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'c_image' => $save_url,
            // 'created_by' => 'admin', // 'Auth::user()->name
            'created_by' => Auth::user()->name,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Customer Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.view')->with($notification);
        // return redirect()->back()->with($notification);
    }
    public function customerEdit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit', compact('customer'));
    }
    public function customerUpdate(Request $request)
    {
        // return $request;
        $customer = request()->id;
        if ($request->file('c_image')) {

            $photo = $request->file('c_image');
            $name_gen = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
            // 25362.png
            Image::make($photo)->resize(200, 200)->save('upload/customer/' . $name_gen);
            $save_url = 'upload/customer/' . $name_gen;
            Customer::where('id', $customer)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'c_image' => $save_url,
                'updated_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer With Image Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('customer.view')->with($notification);
        } else {
            Customer::where('id', $customer)->update([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'address' => $request->address,
                'updated_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Without Image Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('customer.view')->with($notification);
        }
    }
    public function customerDelete($id)
    {
        $customer = Customer::find($id)->delete();
        $photo = $customer->c_image;
        unlink($photo);
        Customer::find($id)->delete();
        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
