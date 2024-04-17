<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //All Admin Review
    public function AllAdminReview()
    {
        $reviews = Review::latest()->get();
        return view('backend.review.all_admin_review', compact('reviews'));
    }

    //Inactive Review
    public function InactiveReview($id)
    {
        Review::find($id)->update([

            'status' => 0,

        ]);

        $notification = array(
            'message' => 'Review Inactive Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    //Active Review
    public function ActiveReview($id)
    {
        Review::find($id)->update([

            'status' => 1,

        ]);

        $notification = array(
            'message' => 'Review Active Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }
}
