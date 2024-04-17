<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\VendorRegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;

class VendorController extends Controller
{
    //Vendor DashBoard
    public function VendorDashBoard()
    {
        return view('vendor.index');
    }

    //Vendor Login
    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    }

    //Vendor Register
    public function VendorRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
    
        [
            'email' => 'Email Already Used',
        ]
    
    );

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Vendor Register Successfully',
            'alert-type' => 'info',
        );

        $vuser = User::where('role','admin')->get();
        
        Notification::send($vuser, new VendorRegisterNotification($request));
        

        return redirect()->route('vendor.login')->with($notification);
    }

    //Vendor Profile
    public function VendorProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('vendor.vendor_profile', compact('profileData'));
    }

    public function VendorProfileStore(Request $request)
    {
        $validateData = $request->validate(
            [
                'photo' => ['mimes:jpeg,png,jpg,gif,svg,webp'],
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
            @unlink(public_path('upload/vendor_images/' . $update->photo));
            $filename = date('Y') . $file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images/'), $filename);
            $update['photo'] = $filename;
        }

        $update->save();

        $notification = array(
            'message' => 'Vendor Profile Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('vendor.profile')->with($notification);
    }

    //Vendor Password
    public function VendorPassword()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('vendor.vendor_password', compact('profileData'));
    }

    //Vendor Password Update
    public function VendorPasswordUpdate(Request $request)
    {
        //validatek
        $request->validate([

            'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers()

            ],
        ]);

        // Match Old Password
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



    //Vendor Logout
    public function VendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

            'message' => 'Logout Successfully',
            'alert-type' => 'info',

        );

        return redirect()->route('index')->with($notification);
    }
}
