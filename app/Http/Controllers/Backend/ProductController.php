<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProductController extends Controller
{
    //All Product
    public function AllProduct()
    {
        $product = Product::latest()->get();
        return view('backend.product.all_product', compact('product'));
    }

    //Add Product
    public function AddProduct()
    {
        $category = Category::orderBy('category_name', 'ASC')->latest()->get();
        return view('backend.product.add_product', compact('category'));
    }

    //Store Product
    public function StoreProduct(Request $request)
    {
        $validateData = $request->validate(
            [
                'product_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $image = $request->file('product_image');
        $name_gen = date('Y') . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(290, 250)->save('upload/product/product_image/' . $name_gen);
        $save_url = 'upload/product/product_image/' . $name_gen;

        $code = IdGenerator::generate(['table' => 'products', 'field' => 'product_code', 'length' => 6, 'prefix' => 'PC']);

        $product_id = Product::insertGetId([

            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace('-', '', $request->product_name)),
            'product_code' => $code,
            'product_qty' => $request->product_qty,
            'brand_name' => $request->brand_name,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'size' => $request->size,
            'color' => $request->color,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,

            'featured' => $request->featured,
            'hot_deal' => $request->hot_deal,
            'best_seeling' => $request->best_seeling,
            'new' => $request->new,
            'status' => 1,
            'product_image' => $save_url,
            'created_at' => now(),

        ]);

        // Multi Image

        $images = $request->file('multi_img');

        foreach ($images as $img) {
            $make_gen = date('Y') . '.' . $img->getClientOriginalName();
            Image::make($img)->resize(600, 600)->save('upload/product/multi_img/' . $make_gen);
            $uploadPath = 'upload/product/multi_img/' . $make_gen;

            MultiImg::insert([

                'product_id' => $product_id,
                'multi_img' => $uploadPath,
                'created_at' => now(),

            ]);
        }
        // Multi Image

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('add.product')->with($notification);
    }

    //Edit Product
    public function EditProduct($id)
    {
        $editproduct = Product::find($id);
        $category = Category::orderBy('category_name', 'ASC')->latest()->get();

        $edit = $editproduct->category_id;
        $subcategory = SubCategory::where('category_id', $edit)->latest()->get();

        $multiimg = MultiImg::where('product_id', $id)->get();

        return view('backend.product.edit_product', compact('category', 'editproduct', 'subcategory', 'multiimg'));
    }

    //Update Product
    public function UpdateProduct(Request $request)
    {
        $uid = $request->id;
        $old_img = $request->old_image;

        $validateData = $request->validate(
            [
                'product_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        if ($request->file('product_image')) {

            $image = $request->file('product_image');
            $name_gen = date('Y') . '.' . $image->getClientOriginalName();
            Image::make($image)->resize(290, 250)->save('upload/product/product_image/' . $name_gen);
            $save_url = 'upload/product/product_image/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            // $code = IdGenerator::generate(['table' => 'products', 'field' => 'product_code', 'length' => 6, 'prefix' => 'PC']);

            Product::find($uid)->update([

                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace('-', '', $request->product_name)),
                'product_qty' => $request->product_qty,
                'brand_name' => $request->brand_name,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,

                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'size' => $request->size,
                'color' => $request->color,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,

                'featured' => $request->featured,
                'hot_deal' => $request->hot_deal,
                'best_seeling' => $request->best_seeling,
                'new' => $request->new,
                'status' => 1,
                'product_image' => $save_url,

            ]);

            $notification = array(
                'message' => 'Product Update With Successfully',
                'alert-type' => 'info',
            );

            return redirect()->back()->with($notification);
        } else {

            Product::find($uid)->update([

                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace('-', '', $request->product_name)),
                'product_qty' => $request->product_qty,
                'brand_name' => $request->brand_name,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,

                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'size' => $request->size,
                'color' => $request->color,
                'stock' => $request->stock,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,

                'featured' => $request->featured,
                'hot_deal' => $request->hot_deal,
                'best_seeling' => $request->best_seeling,
                'new' => $request->new,
                'status' => 1,

            ]);

            $notification = array(
                'message' => 'Product Update WithOut Successfully',
                'alert-type' => 'info',
            );

            return redirect()->back()->with($notification);
        }
    }

    //Store MultiImage

    public function StoreMultiImage(Request $request)
    {
        $new_multi = $request->imageid;
        $image = $request->file('multi_img');

        $make_name = date('Y') . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(600, 600)->save('upload/product/multi_img/' . $make_name);
        $uploadPath = 'upload/product/multi_img/' . $make_name;

        MultiImg::insert([

            'product_id' => $new_multi,
            'multi_img' => $uploadPath,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Add Multi Image Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    //Update MultiImage
    public function UpdateMultiImage(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {

            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->multi_img);//database imag name

            $make_name = date('Y') . '.' . $img->getClientOriginalName();
            Image::make($img)->resize(600, 600)->save('upload/product/multi_img/' . $make_name);
            $uploadPath = 'upload/product/multi_img/' . $make_name;

            MultiImg::where('id', $id)->update([
                'multi_img' => $uploadPath,

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Multi Image Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    //Delete MultiImage
    public function DeleteMultiImage($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->multi_img);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Multi Image Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    //Delete Product
    public function DeleteProduct($id)
    {
        $product = Product::findOrFail($id);

        unlink($product->product_image);

        Product::findOrFail($id)->delete();

        $imges = MultiImg::where('product_id', $id)->get();

        foreach ($imges as $img) {
            unlink($img->multi_img);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }


    //Inactive Product
    public function InactiveProduct($id)
    {
        Product::find($id)->update([

            'status' => '0',

        ]);

        $notification = array(

            'message' => 'Product Inactive Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    //Active Product
    public function ActiveProduct($id)
    {
        Product::find($id)->update([

            'status' => '1',

        ]);

        $notification = array(

            'message' => 'Product Active Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }

    //All Stock
    public function AllStock()
    {
        $product = Product::latest()->get();
        return view('backend.stock.stock',compact('product'));
    }
}
