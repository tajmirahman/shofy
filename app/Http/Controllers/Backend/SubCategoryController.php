<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    //All SubCategory
    public function AllSubCategory()
    {
        $subcategory = SubCategory::latest()->get();
        return view('backend.subcategory.all_subcategory', compact('subcategory'));
    }

    //Add SubCategory
    public function AddSubCategory()
    {
        $category = Category::orderBy('category_name', 'ASC')->latest()->get();
        return view('backend.subcategory.add_subcategory', compact('category'));
    }

    //Store SubCategory
    public function StoreSubCategory(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],


        );

        $image = $request->file('image');
        $name_gen = date('Y') . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(80, 100)->save('upload/subcategory_images/' . $name_gen);
        $save_url = 'upload/subcategory_images/' . $name_gen;

        SubCategory::insert([

            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),
            'image' => $save_url,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'SubCategory Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    //Edit SubCategory
    public function EditSubCategory($id)
    {
        $editsubcat = SubCategory::find($id);
        $category = Category::orderBy('category_name', 'ASC')->latest()->get();
        
        return view('backend.subcategory.edit_subcategory', compact('editsubcat', 'category'));
    }

    //Update SubCategory
    public function UpdateSubCategory(Request $request)
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
            Image::make($image)->resize(80, 100)->save('upload/subcategory_images/' . $name_gen);
            $save_url = 'upload/subcategory_images/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            SubCategory::findOrFail($uid)->update([

                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'SubCategory Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.subcategory')->with($notification);
        } else {

            SubCategory::findOrFail($uid)->update([

                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),

            ]);

            $notification = array(
                'message' => 'SubCategory Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.subcategory')->with($notification);
        }
    }

    //Delete SubCategory
    public function DeleteSubCategory($id)
    {
        $delete = SubCategory::find($id);
        $del_img = $delete->image;
        unlink($del_img);

        SubCategory::find($id)->delete();

        $notification = array(
            'message' => 'SubCategory Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    // AAjax in product 

    public function GetSubCategory($category_id){

        $subCat = SubCategory::where('category_id' , $category_id)->orderBy('subcategory_name','ASc')->get();

        return json_encode($subCat);

    }

    
}
