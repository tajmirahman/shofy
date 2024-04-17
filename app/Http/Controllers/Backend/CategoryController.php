<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    //All Category
    public function AllCategory()
    {
        $category = Category::latest()->get();
        return view('backend.category.all_category', compact('category'));
    }

    //Add Category
    public function AddCategory()
    {
        return view('backend.category.add_category');
    }

    //Store Category
    public function StoreCategory(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $image = $request->file('image');
        $name_gen = date('Y') . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(80, 100)->save('upload/category_images/' . $name_gen);
        $save_url = 'upload/category_images/' . $name_gen;

        Category::insert([

            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
            'image' => $save_url,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.category')->with($notification);
    }

    //Edit Category
    public function EditCategory($id)
    {
        $editcat = Category::find($id);
        return view('backend.category.edit_category', compact('editcat'));
    }

    //Update Category
    public function UpdateCategory(Request $request)
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
            Image::make($image)->resize(80, 100)->save('upload/category_images/' . $name_gen);
            $save_url = 'upload/category_images/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Category::findOrFail($uid)->update([

                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Category Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.category')->with($notification);
        } else {

            Category::findOrFail($uid)->update([

                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace('', '-', $request->category_name)),

            ]);

            $notification = array(
                'message' => 'Category Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.category')->with($notification);

        }
    }

    //Delete Category
    public function DeleteCategory($id)
    {
        $delete = Category::find($id);
        $del_img = $delete->image;
        unlink($del_img);

        Category::find($id)->delete();

        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.category')->with($notification);
    }
}
