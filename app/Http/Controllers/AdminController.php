<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function change_password()
    {
        return view('admin.change_password');
    }
    public function update_password(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
            session()->flash('message', 'Password Changed Successfully');
            return redirect()->back();
        } else {
            session()->flash('message', 'Old Password is not Matched');
            return redirect()->back();
        }
    }

    //end method
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User Logut Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } //Enf method
    public function profile()
    {

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.profile', compact('adminData'));
        // return redirect('/dashboard');
    } //Enf method
    public function edit_profile()
    {

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.profile_edit', compact('editData'));
    } //Enf method
    public function store_profile(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->file('profile_image')) {

            $file = $request->file('profile_image');
            // @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = 'upload/admin_images/' . $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin Profile Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    } //Enf method
}
