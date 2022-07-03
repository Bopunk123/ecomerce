<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile',compact('adminData'));
    }

    public function AdminProfileEdit(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_edit',compact('adminData'));
    } 
    
    public function AdminProfileStore(Request $request){
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('admin_profile_image')){
            $image = $request->file('admin_profile_image');
            unlink(public_path('upload/admin_images/').$data->profile_photo_path);
            $filename = date('YmdHi').$image->getClientOriginalName();

            $image->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;

        }
        $data->save();

        $notification = array(
            'message' => 'Profile updated successfully ',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }

    public function UpdateChangePassword(Request $request){
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            $notification = array(
                'message' => 'Old Password didnt match!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
