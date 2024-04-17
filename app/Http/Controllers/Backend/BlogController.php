<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    //All Blog Category
    public function AllBlogCategory()
    {
        $blog = BlogCategory::latest()->get();
        return view('backend.blog.all_blog_category', compact('blog'));
    }

    //Store BlogCategory
    public function StoreBlogCategory(Request $request)
    {

        BlogCategory::insert([

            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace('', '-', $request->blog_category_slug)),
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Blog Category Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function EditBlogCategory($id)
    {

        $categories = BlogCategory::findOrFail($id);
        return response()->json($categories);
    }

    //Update BlogCategory
    public function UpdateBlogCategory(Request $request)
    {

        $cat_id = $request->cat_id;

        BlogCategory::findOrFail($cat_id)->update([

            'blog_category_name' => $request->blog_category_name,
            'blog_category_name' => strtolower(str_replace(' ', '-', $request->blog_category_name)),
        ]);

        $notification = array(
            'message' => 'BlogCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    //Delete BlogCategory
    public function DeleteBlogCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'BlogCategory Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    ///////////////////////  Blog Post ////////////////////////

    //All BlogPost
    public function AllBlogPost()
    {
        $post = BlogPost::latest()->get();
        return view('backend.blogpost.all_blog_post', compact('post'));
    }

    //Add BlogPost
    public function AddBlogPost()
    {
        $blogcat = BlogCategory::latest()->get();
        return view('backend.blogpost.add_blog_post', compact('blogcat'));
    }

    //Store BlogPost
    public function StoreBlogPost(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $image = $request->file('image');
        $name_gen = date('Y') . '.' . $image->getClientOriginalName();
        Image::make($image)->resize(385, 270)->save('upload/blogpost_images/' . $name_gen);
        $save_url = 'upload/blogpost_images/' . $name_gen;

        BlogPost::insert([

            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace('', '-', $request->post_title)),
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'image' => $save_url,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.blog.post')->with($notification);
    }

    //Edit BlogPost
    public function EditBlogPost($id)
    {
        $editpost = BlogPost::find($id);
        $blogcat = BlogCategory::latest()->get();

        return view('backend.blogpost.edit_blog_post', compact('editpost', 'blogcat'));
    }

    //Update BlogPost
    public function UpdateBlogPost(Request $request)
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
            Image::make($image)->resize(385, 270)->save('upload/blogpost_images/' . $name_gen);
            $save_url = 'upload/blogpost_images/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            BlogPost::findOrFail($uid)->update([

                'blogcat_id' => $request->blogcat_id,
                'user_id' => Auth::user()->id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace('', '-', $request->post_title)),
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'image' => $save_url,

            ]);

            $notification = array(
                'message' => 'BlogPost Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.blog.post')->with($notification);
        } else {

            BlogPost::findOrFail($uid)->update([

                'blogcat_id' => $request->blogcat_id,
                'user_id' => Auth::user()->id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace('', '-', $request->post_title)),
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,

            ]);

            $notification = array(
                'message' => 'BlogPost Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.blog.post')->with($notification);
        }
    }

    //Delete BlogPost
    public function DeleteBlogPost($id)
    {
        $delete = BlogPost::find($id);
        $del_img = $delete->image;
        unlink($del_img);

        BlogPost::find($id)->delete();

        $notification = array(
            'message' => 'BlogPost Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    //All BlogComment
    public function AllBlogComment()
    {
        $comment = Comment::where('parent_id',null)->latest()->get();
        return view('backend.blogpost.all_blog_comment', compact('comment'));
    }

    //Blog PostReply
    public function BlogPostReply($id)
    {
        $comment = Comment::where('id',$id)->first();
        return view('backend.blogpost.blog_post_reply', compact('comment'));
    }

    //AdminBlog CommentReply
    public function AdminBlogCommentReply(Request $request)
    {
        $id = $request->id;
        $user_id = $request->user_id;
        $post_id = $request->post_id;
        $subject = $request->subject;

        Comment::insert([

            'user_id' => $user_id,
            'post_id' => $post_id,
            'subject' => $subject,
            'parent_id' => $id,
            'message' => $request->message,
            'created_at' => now(),

        ]);

        $notification = array(
            'message' => 'BlogPost Comment Reply Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.blog.comment')->with($notification);
    }


}
