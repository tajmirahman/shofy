<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class VendorProductController extends Controller
{
    //All Vendor Product
    public function AllVendorProduct()
    {
        $id = Auth::user()->id;

        $product = Product::where('vendor_id',$id)->latest()->get();
        return view('backend.vendor.vproduct.all_vendor_product', compact('product'));
    }

    //Add Vendor Product
    public function AddVendorProduct()
    {
        $category = Category::orderBy('category_name', 'ASC')->latest()->get();
        return view('backend.vendor.vproduct.add_vemdor_product', compact('category'));
    }

    //Store Vendor Product
    public function StoreVendorProduct(Request $request)
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
            'vendor_id' => Auth::user()->id,
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

        return redirect()->route('add.vendor.product')->with($notification);
    }

    //Edit Vendor Product
    public function EditVendorProduct($id)
    {
        $editproduct = Product::find($id);
        $category = Category::orderBy('category_name', 'ASC')->latest()->get();

        $edit = $editproduct->category_id;
        $subcategory = SubCategory::where('category_id', $edit)->latest()->get();

        $multiimg = MultiImg::where('product_id', $id)->get();

        return view('backend.vendor.vproduct.edit_vendor_product', compact('category', 'editproduct', 'subcategory', 'multiimg'));
    }

    //Update Vendor Product
    public function UpdateVendorProduct(Request $request)
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
                'vendor_id' => Auth::user()->id,
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
                'message' => 'Product Update With Image Successfully',
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
                'vendor_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,

                'featured' => $request->featured,
                'hot_deal' => $request->hot_deal,
                'best_seeling' => $request->best_seeling,
                'new' => $request->new,
                'status' => 1,

            ]);

            $notification = array(
                'message' => 'Product Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->back()->with($notification);
        }
    }

    //Store Vendor MultiImage

    public function StoreVendorMultiImage(Request $request)
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

    //Update Vendor MultiImage
    public function UpdateVendorMultiImage(Request $request)
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

    //Delete Vendor MultiImage
    public function DeleteVendorMultiImage($id)
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

    //Delete Vendor Product
    public function DeleteVendorProduct($id)
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

    // AAjax in product 

    public function VendorGetSubCategory($category_id){

        $subCat = SubCategory::where('category_id' , $category_id)->orderBy('subcategory_name','ASc')->get();

        return json_encode($subCat);

    }


///////////////////////////// Order ///////////////////////


    //All Order
    public function AllVendorOrder()
    {
        $id = Auth::user()->id;
        $orderitem = OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();

        return view('backend.vendor.order.all_vendor_order',compact('orderitem'));
    }

    //Vendor OrderDetails
    public function VendorOrderDetails($id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id',$id)->first();
        $orderitem = OrderItem::with('product')->where('order_id',$id)->get();


        return view('backend.vendor.order.vendor_order_details',compact('order','orderitem'));
    }

   
}
