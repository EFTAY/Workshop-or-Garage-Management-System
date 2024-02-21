<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function unitAdd()
    {
        try {
            return view('admin.unit.add');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function unitStore(Request $request)
    {
        try {
            $request->validate([
                'unit_name' => 'required',
            ]);
            Unit::create([
                'unit_name' => $request->unit_name,
                // 'status' => request()->status,
                'created_by' => Auth::user()->name,
                'created_at' => Carbon::now()
            ]);

            $notification = array(
                'message' => 'Unit Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function unitEdit($id)
    {
        try {
            $unit = Unit::find($id);
            return view('admin.unit.edit', compact('unit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function unitUpdate(Request $request)
    {

        try {
            $request->validate([
                'unit_name' => 'required',
            ]);

            $unit = $request->id;

            Unit::where('id', $unit)->update([
                'unit_name' => $request->unit_name,
                // 'status' => request()->status,
                'updated_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Unit Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('unit.view')->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function unitDelete($id)
    {
        try {
            $unit = Unit::find($id);
            $unit->delete();
            return back()->with('success', 'Unit Deleted Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function unitView()
    {
        try {
            $units = Unit::all();
            return view('admin.unit.view', compact('units'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
