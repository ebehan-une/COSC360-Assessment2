<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Route;

class PostController extends Controller
{
    public function list() {
        $posts = Post::all();
        $category = Category::where('id', )

        return view('posts.index', ['posts' => $posts]);
    }

    public function edit(string $id) {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function create() {
        return view('posts.create');
    }

    public function save(PostRequest $request) {
        

        return redirect()->route('index')->with('message', 'Post Was Saved Successfully!');
    }

    public function delete(string $id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('index')->with('message', 'Post Was Deleted Successfully!');
    }
}