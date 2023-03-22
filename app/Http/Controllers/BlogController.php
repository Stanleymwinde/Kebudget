<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function showBlogs()
    {
        $categories = Category::all();
        $posts = Post::latest()->get();

        return view('admin.blog.show', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blog.create', compact('categories'));
    }

    public function singleBlog(Post $post)
    {

        $categories = Category::all();

        return view('admin.blog.single', compact('post', 'categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        $title = $request->input('title');
        $category_id = $request->input('category_id');

        if (Post::latest()->first() !== null) {
            $postId = Post::latest()->first()->id + 1;
        } else {
            $postId = 1;
        }

        $slug = Str::slug($title, '-') . '-' . $postId;
        $user_id = Auth::user()->id;
        $body = $request->input('body');

        //File upload
        $imagePath = 'storage/' . $request->file('image')->store('postsImages', 'public');

        $post = new Post();
        $post->title = $title;
        $post->category_id = $category_id;
        $post->slug = $slug;
        $post->user_id = $user_id;
        $post->body = $body;
        $post->imagePath = $imagePath;

        $post->save();

        return redirect()->back()->with('status', 'Post Created Successfully');
    }

    public function editBlog(Post $post)
    {

        // if(auth()->user()->id !== $post->user->id){
        //     abort(403);
        // }

        $categories = Category::all();

        return view('admin.blog.edit', compact('post', 'categories'));
    }

    public function updateBlog(Request $request, Post $post)
    {

        // if(auth()->user()->id !== $post->user->id){
        //     abort(403);
        // }

        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'body' => 'required'
        ]);

        $title = $request->input('title');
        $category_id = $request->input('category_id');
        $postId = $post->id;
        $slug = Str::slug($title, '-') . '-' . $postId;
        $body = $request->input('body');

        //File upload
        $imagePath = 'storage/' . $request->file('image')->store('postsImages', 'public');


        $post->title = $title;
        $post->slug = $slug;
        $post->body = $body;
        $post->category_id = $category_id;
        $post->imagePath = $imagePath;

        $post->save();

        return redirect()->back()->with('status', 'Post Edited Successfully');
    }

    // Using Route model binding
    public function show(Post $post)
    {
        $category = $post->category;

        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
        return view('blogPosts.single-blog-post', compact('post', 'relatedPosts'));
    }

    public function deleteBlog(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('status', 'Post Delete Successfully');
    }
}
