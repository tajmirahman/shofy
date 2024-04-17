<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\VendorActiveNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //Admin DashBoard
    public function AdminDashBoard()
    {
        return view('admin.index');
    }

    //Admin Login
    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    //Admin Profile
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('admin.admin_profile', compact('profileData'));
    }

    public function AdminProfileStore(Request $request)
    {
        $validateData = $request->validate(
            [
                'phone' => 'numeric|digits:11',
                'photo' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $id = Auth::user()->id;
        $update = User::findOrFail($id);

        $update->name = $request->name;
        $update->username = $request->username;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $update->photo));
            $filename = date('Y') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            $update['photo'] = $filename;
        }

        $update->save();

        $notification = array(
            'message' => 'Admin Profile Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    //Admin Password
    public function AdminPassword()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('admin.admin_password', compact('profileData'));
    }

    //Admin Password Update
    public function AdminPasswordUpdate(Request $request)
    {
        //validatek
        $request->validate([

            'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers()

            ],
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old Password Not Match',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }

        //Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }



    //Admin Logout
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

            'message' => 'Logout Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('admin.login')->with($notification);
    }

    //Admin Forgot Password
    public function AdminForgotPassword()
    {
        return view('admin.admin_forgot_password');
    }

    //All Vendor
    public function AllVendor()
    {
        $vendor = User::where('role', 'vendor')->latest()->get();
        return view('backend.vendor.all_vendor', compact('vendor'));
    }

    //Inactive Vendor
    public function InactiveVendor($id)
    {
        User::find($id)->update([

            'status' => 'inactive',

        ]);

        $notification = array(

            'message' => 'Vendor Inactive Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    //Active Vendor
    public function ActiveVendor(Request $request,$id)
    {
        User::find($id)->update([

            'status' => 'active',

        ]);

        $notification = array(

            'message' => 'Vendor Active Successfully',
            'alert-type' => 'info',

        );

        $user = User::where('role', 'vendor')->get();
        Notification::send($user, new VendorActiveNotification($request));


        return redirect()->back()->with($notification);
    }

    //Delete Vendor
    public function DeleteVendor($id)
    {
        User::find($id)->delete();

        $notification = array(

            'message' => 'Vendor Delete Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    //All User
    public function AllUser()
    {
        $user = User::where('role', 'user')->latest()->get();
        return view('backend.user.all_user', compact('user'));
    }

    //Inactive User
    public function InactiveUser($id)
    {
        User::find($id)->update([

            'status' => 'inactive',

        ]);

        $notification = array(

            'message' => 'User Inactive Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    //Active User
    public function ActiveUser($id)
    {
        User::find($id)->update([

            'status' => 'active',

        ]);

        $notification = array(

            'message' => 'User Active Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    //Delete User
    public function DeleteUser($id)
    {
        User::find($id)->delete();

        $notification = array(

            'message' => 'User Delete Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    //All Admin
    public function AllAdmin()
    {
        $admin = User::where('role', 'admin')->latest()->get();

        return view('backend.admin.all_admin', compact('admin'));
    }

    //Add Admin
    public function AddAdmin()
    {
        $roles = Role::all();
        return view('backend.admin.add_admin', compact('roles'));
    }

    public function StoreAdmin(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password =  Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if($request->roles)
        {
            $user->assignRole($request->roles);
        }
        $notification = array(
            'message' => 'New Admin User Inserted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.admin')->with($notification);

    }
}
