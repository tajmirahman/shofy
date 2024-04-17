<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    //All Slider
    public function AllSlider()
    {
        $slider = Slider::latest()->get();
        return view('backend.slider.all_slider', compact('slider'));
    }

    //Add Slider
    public function AddSlider()
    {
        return view('backend.slider.add_slider');
    }

    //Store Slider
    public function Storeslider(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $image = $request->file('image');
        $name_gen = date('Y') . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(740, 370)->save('upload/slider_images/' . $name_gen);
        $save_url = 'upload/slider_images/' . $name_gen;

        slider::insert([

            'slider_title' => $request->slider_title,
            'slider_subtitle' => $request->slider_subtitle,
            'image' => $save_url,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.slider')->with($notification);
    }

    //Edit Slider
    public function EditSlider($id)
    {
        $editslider = slider::find($id);
        return view('backend.slider.edit_slider', compact('editslider'));
    }

    //Update Slider
    public function UpdateSlider(Request $request)
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
            Image::make($image)->resize(740, 370)->save('upload/slider_images/' . $name_gen);
            $save_url = 'upload/slider_images/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            slider::findOrFail($uid)->update([

                'slider_title' => $request->slider_title,
                'slider_subtitle' => $request->slider_subtitle,
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Slider Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.slider')->with($notification);
        } else {

            slider::findOrFail($uid)->update([

                'slider_title' => $request->slider_title,
                'slider_subtitle' => $request->slider_subtitle,

            ]);

            $notification = array(
                'message' => 'Slider Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.slider')->with($notification);
        }
    }

    //Delete Slider
    public function DeleteSlider($id)
    {
        $delete = Slider::find($id);
        $del_img = $delete->image;
        unlink($del_img);

        Slider::find($id)->delete();

        $notification = array(
            'message' => 'Slider Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.slider')->with($notification);
    }
}
