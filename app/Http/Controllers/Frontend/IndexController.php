<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }

    public function UserLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('frontend.profile.user_profile',compact('data'));
    }

    public function UserProfileStore(Request $request){
        $id = $request->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $image = $request->file('profile_photo_path');
            unlink(public_path('upload/user_images/').$data->profile_photo_path);
            
            $filename = date('YmdHi').$image->getClientOriginalName();

            $image->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;

        }
        $data->save();

        $notification = array(
            'message' => 'Profile updated successfully ',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){
        return view('frontend.profile.change_password');
    }

    public function UserUpdateChangePassword(Request $request){
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $id = Auth::user()->id;
        $hashedPassword = User::find($id)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            $notification = array(
                'message' => 'Old Password didnt match!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
