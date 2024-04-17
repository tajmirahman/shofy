<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Review;
use App\Models\SubCategory;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class IndexController extends Controller
{
    //Index
    public function Index()
    {
        return view('frontend.index');
    }

    //Category
    public function AllCategoryFront()
    {
        $categorys = Category::orderBy('category_name', 'ASC')->latest()->get();
        return view('frontend.page.category.all_category_front', compact('categorys'));
    }

    //CateWise Product
    public function CateWiseProduct($id)
    {
        $products = Product::where('category_id', $id)->where('status', '1')->paginate(12);

        $categorys = Category::orderBy('category_name', 'ASC')->latest()->get();

        $subcategorys = SubCategory::where('category_id', $id)->latest()->get();

        $breadcat = Category::where('id', $id)->first();

        return view('frontend.page.category.catwiseproduct', compact('products', 'categorys', 'breadcat', 'subcategorys'));
    }

    //SubCateWise Product
    public function SubCateWiseProduct($id)
    {
        $products = Product::where('subcategory_id', $id)->where('status', '1')->paginate(12);

        $categorys = Category::orderBy('category_name', 'ASC')->latest()->get();

        $subbreadcat = SubCategory::where('id', $id)->first();

        return view('frontend.page.subcategory.subcatwiseproduct', compact('products', 'categorys', 'subbreadcat'));
    }

    //Total Product
    public function TotalDetails()
    {
        $products = Product::where('status', 1)->paginate(30);
        return view('frontend.page.product.total_product', compact('products'));
    }

    //Product Details
    public function ProductDetails($id)
    {
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id', $id)->get();

        $color = $product->color;
        $product_color = explode(',', $color);

        $size = $product->size;
        $product_size = explode(',', $size);

        $subcat = $product->subcategory_id;
        $relatedProduct = Product::where('subcategory_id', $subcat)->where('id', '!=', $id)->limit(7)->get();

        return view('frontend.page.product.product_details', compact('product', 'multiImg', 'product_color', 'product_size', 'relatedProduct'));
    }

    //ProductViewAjax

    public function ProductViewAjax($id)
    {

        $product = Product::with('subcategory')->findOrFail($id);

        $color = $product->color;
        $product_color = explode(',', $color);

        $size = $product->size;
        $product_size = explode(',', $size);

        return response()->json(array(

            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,

        ));
    } // End Method

    //Total BlogPost
    public function TotalBlogPost()
    {
        $blogs = BlogPost::latest()->paginate(9);
        return view('frontend.page.blogpost.total_blog_post', compact('blogs'));
    }

    //BlogDetails
    public function BlogDetails($id)
    {
        $blog = BlogPost::where('id', $id)->first();
        return view('frontend.page.blogpost.blog_details', compact('blog'));
    }

    //Store Comment
    public function StoreComment(Request $request)
    {
        $pid = $request->post_id;

        Comment::insert([

            'user_id' => Auth::user()->id,
            'post_id' => $pid,
            'parent_id' => null,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => now(),
        ]);

        $notification = array(

            'message' => 'Comment Send Successfully',
            'alert-type' => 'success',

        );

        return redirect()->back()->with($notification);
    }

    //Store Review
    public function StoreReview(Request $request)
    {
        $pid = $request->product_id;
        $vid = $request->hvendor_id;

        Review::insert([

            'user_id' => Auth::user()->id,
            'product_id' => $pid,
            'vendor_id' => $vid,
            'parent_id' => null,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'created_at' => now(),
        ]);

        $notification = array(

            'message' => 'Review Send Successfully',
            'alert-type' => 'success',

        );

        return redirect()->back()->with($notification);
    }

    //Contact
    public function Contact()
    {
        return view('frontend.page.contact.contact');
    }

    //Store Contact
    public function StoreContact(Request $request)
    {
        $contact = Contact::insert([

            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,

            'created_at' => now(),
        ]);

        // Start Send Email

        $contactmsg = Contact::findOrFail($contact);

        $data = [

            'name' => $contactmsg->name,
            'email' => $contactmsg->email,
            'message' => $contactmsg->message,
            'subject' => $contactmsg->subject,

        ];

        Mail::to($request->email)->send(new ContactMail($data));

        // End Send Email

        $notification = array(

            'message' => 'Message Send Successfully',
            'alert-type' => 'success',

        );

        return redirect()->back()->with($notification);
    }

    //Subscribe
    public function Subscribe(Request $request)
    {
        Subscribe::insert([

            'subscribe' => $request->subscribe,
            'created_at' => now(),
        ]);

        // $notification = array(

        //     'message' => 'Review Send Successfully',
        //     'alert-type' => 'success',

        // );

        return redirect()->back();
    }

    // Login With Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
       
        $finduser = User::where('google_id', $user->id)->first();
   
        if($finduser){
   
            Auth::login($finduser);
  
            return redirect()->route('user.dashboard');
   
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id'=> $user->id,
                'password' => encrypt('123456dummy')
            ]);
  
            Auth::login($newUser);
  
            return redirect()->route('user.dashboard');
        }
    }

}
