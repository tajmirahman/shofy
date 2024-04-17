<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    //All SiteSetting
    public function AllSiteSetting()
    {
        $site = SiteSetting::latest()->get();
        return view('backend.site.all_site_setting',compact('site'));
    }

    //Add SiteSetting
    public function AddSiteSetting()
    {
        return view('backend.site.add_site_setting');
    }

    //Store SiteSetting
    public function StoreSiteSetting(Request $request)
    {
        SiteSetting::insert([

            'offer' => $request->offer,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'SiteSetting Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.site.setting')->with($notification);
    }

    //Edit SiteSetting
    public function EditSiteSetting($id)
    {
        $site = SiteSetting::find($id);
        return view('backend.site.edit_site_setting',compact('site'));
    }

    //Update SiteSetting
    public function UpdateSiteSetting(Request $request)
    {
        $uid = $request->id;

        SiteSetting::find($uid)->update([

            'offer' => $request->offer,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'SiteSetting Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.site.setting')->with($notification);
    }
}
