<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    //All Banner
    public function AllBanner()
    {
        $banner = Banner::latest()->get();
        return view('backend.banner.all_banner', compact('banner'));
    }

    //Add Banner
    public function AddBanner()
    {
        return view('backend.banner.add_banner');
    }

    //Store Banner
    public function StoreBanner(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $image = $request->file('image');
        $name_gen = date('Y') . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(400, 365)->save('upload/banner_images/' . $name_gen);
        $save_url = 'upload/banner_images/' . $name_gen;

        banner::insert([

            'banner_title' => $request->banner_title,
            'banner_subtitle' => $request->banner_subtitle,
            'image' => $save_url,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Banner Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.banner')->with($notification);
    }

    //Edit Banner
    public function EditBanner($id)
    {
        $editbanner = Banner::find($id);
        return view('backend.banner.edit_banner', compact('editbanner'));
    }

    //Update Banner
    public function UpdateBanner(Request $request)
    {
        $uid = $request->id;
        $old_img = $request->old_image;

        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = date('Y') . '.' . $image->getClientOriginalName();
            Image::make($image)->resize(400, 365)->save('upload/banner_images/' . $name_gen);
            $save_url = 'upload/banner_images/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            banner::findOrFail($uid)->update([

                'banner_title' => $request->banner_title,
                'banner_subtitle' => $request->banner_subtitle,
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Banner Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.banner')->with($notification);
        } else {

            banner::findOrFail($uid)->update([

                'banner_title' => $request->banner_title,
                'banner_subtitle' => $request->banner_subtitle,

            ]);

            $notification = array(
                'message' => 'Banner Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.banner')->with($notification);
        }
    }

    //Delete banner
    public function DeleteBanner($id)
    {
        $delete = Banner::find($id);
        $del_img = $delete->image;
        unlink($del_img);

        Banner::find($id)->delete();

        $notification = array(
            'message' => 'Banner Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.banner')->with($notification);
    }
}
