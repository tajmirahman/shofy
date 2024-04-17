<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    //All Subscribe
    public function AllSubscribe()
    {
        $subscribe = Subscribe::latest()->get();
        return view('backend.subscribe.all_subscribe', compact('subscribe'));
    }

    //Delete Subscribe
    public function DeleteSubscribe($id)
    {
        Subscribe::find($id)->delete();

        $notification = array(
            'message' => 'Subscribe Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }
}
