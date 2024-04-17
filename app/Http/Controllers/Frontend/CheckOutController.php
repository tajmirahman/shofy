<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function GetCheckDistrict($division_id)
    {

        $district = District::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();

        return json_encode($district);
    }

    public function StateGetAjax($district_id)
    {

        $ship = State::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();

        return json_encode($ship);
    }
    // End Method

    public function CheckoutStore(Request $request)
    {

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;

        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes;

        $cartTotal = Cart::total();

        if ($request->payment_option == 'stripe') {
            return view('frontend.page.payment.stripe', compact('data', 'cartTotal'));
        } elseif ($request->payment_option == 'card') {
            return view('frontend.page.payment.ssl');
        } else {
            return view('frontend.page.payment.cash', compact('data', 'cartTotal'));
        }
    }
}
