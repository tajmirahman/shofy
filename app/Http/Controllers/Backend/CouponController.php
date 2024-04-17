<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //All Coupon
    public function AllCoupon()
    {
        $coupon = Coupon::latest()->get();
        return view('backend.coupon.all_coupon',compact('coupon'));
    }

    //Add Coupon
    public function AddCoupon()
    {
        return view('backend.coupon.add_coupon');
    }

    //Store Coupon
    public function StoreCoupon(Request $request)
    {

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Coupon Added Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.coupon')->with($notification);
    }

    //Edit Coupon
    public function EditCoupon($id)
    {
        $editcoupon = Coupon::find($id);
        return view('backend.coupon.edit_coupon',compact('editcoupon'));
    }

    //Update Coupon
    public function UpdateCoupon(Request $request)
    {
        $uid = $request->id;

        Coupon::find($uid)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
        ]);

        $notification = array(
            'message' => 'Coupon Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.coupon')->with($notification);
    }

    //Delete Coupon
    public function DeleteCoupon($id)
    {

        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

}
