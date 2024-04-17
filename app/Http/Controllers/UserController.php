<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class UserController extends Controller
{
    //User DashBoard
    public function UserDashBoard()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);

        return view('dashboard', compact('profileData'));
    }

    //User Profile
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('frontend.dashboard.user_profile', compact('profileData'));
    }

    public function UserProfileStore(Request $request)
    {
        $validateData = $request->validate(
            [
                'phone' => 'numeric|digits:11',
            ],
        );

        $id = Auth::user()->id;
        $update = User::findOrFail($id);

        $update->name = $request->name;
        $update->username = $request->username;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;


        $update->save();

        $notification = array(
            'message' => 'User Profile Update Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    //User Password
    public function UserPassword()
    {
        $id = Auth::user()->id;
        $profileData = User::findOrFail($id);
        return view('frontend.dashboard.user_password', compact('profileData'));
    }

    //User Password Update
    public function UserPasswordUpdate(Request $request)
    {
        //validatek
        $request->validate([

            // 'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers()

            ],
        ]);

        //Match Old Password
        // if (!Hash::check($request->old_password, auth::user()->password)) {

        //     $notification = array(
        //         'message' => 'Old Password Not Match',
        //         'alert-type' => 'error',
        //     );

        //     return redirect()->back()->with($notification);
        // }

        //Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }



    //User Logout
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // $notification = array(

        //     'message' => 'Logout Successfully',
        //     'alert-type' => 'success',

        // );

        return redirect()->route('index');
    }

    //User Order
    public function UserOrder()
    {
        $id = Auth::user()->id;

        $orders = Order::where('user_id', $id)->latest()->get();
        return view('frontend.dashboard.user_order', compact('orders'));
    }

    //User OrderDetails
    public function UserOrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::user()->id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();


        return view('frontend.dashboard.user_order_details', compact('order', 'orderItem'));
    }

    //User OrderInvoice

    public function UserInvoice($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('frontend.page.order.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);

        return $pdf->download('user_invoice.pdf');
    }

    //Return Order

    public function ReturnOrder(Request $request, $order_id)
    {
        Order::find($order_id)->update([

            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,

        ]);

        $notification = array(

            'message' => 'Product Return Request Send Succssfully',
            'alert-type' => 'success',

        );

        return redirect()->route('user.order')->with($notification);
    }

    //User ReturnOrder
    public function UserReturnOrder()
    {
        $orders = Order::where('return_reason', '!=', Null)->where('user_id', Auth::user()->id)->get();

        return view('frontend.dashboard.user_return_order', compact('orders'));
    }

    //User TrackOrder
    public function UserTrackOrder()
    {
        return view('frontend.dashboard.user_track_order');
    }

    //Order Tracking
    public function OrderTracking(Request $request)
    {
        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {
            return view('frontend.dashboard.track_order', compact('track'));
        } else {

            $notification = array(
                'message' => 'Invoice Code Is Invalid',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
