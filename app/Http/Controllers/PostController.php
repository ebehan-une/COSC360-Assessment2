<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function list() {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function edit(string $id) {
        $header = "Edit Blog Post";
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.create', ['header' => $header, 'post' => $post, 'categories' => $categories]);
    }

    public function create() {
        $header = "Create New Blog Post";
        $post = new Post();
        $categories = Category::all();
        return view('admin.posts.create', ['header' => $header, 'post' => $post, 'categories' => $categories]);
    }

    public function save(PostRequest $request) {
        $validated = $request->validated();

        if(isset($request->id)) {
            $post = Post::findOrFail($request->id);
        } else {
            $post = new Post();
        }

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category_id'];

        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('admin.posts.index')->with('message', 'Post Was Saved Successfully!');
    }

    public function delete(string $id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'Post Was Deleted Successfully!');
    }
}