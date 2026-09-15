<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * PostController.
 * 
 * Handles all incoming API requests from ReactJS front-end.
 */
class PostController extends Controller
{
    /**
     * GET Method '/api/posts'.
     * Returns Status Code 200 'OK'.
     */
    public function index(): JsonResponse {

        $posts = Post::all();

        return response()->json($posts, 200);

    }

    /**
     * POST Method '/api/posts'.
     * Returns Status Code 201 'Created'.
     */
    public function store(PostRequest $request): JsonResponse {

        $validated = $request->validated();

        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'user_id' => $request->user()->id,
        ]);

        return response()->json($post, 201);

    }
    
    /**
     * GET Method '/api/posts/{id}'.
     * Returns Status Code 200 'OK'.
     */
    public function show(string $id): JsonResponse {

        $post = Post::findOrFail($id);

        return response()->json($post, 200);

    }

    /**
     * PUT Method '/api/posts/{id}'.
     * Returns Status Code 200 'OK'.
     */
    public function update(PostRequest $request, string $id): JsonResponse {

        $validated = $request->validated();
        
        $post = Post::findOrFail($id);
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category_id'];
        $post->save();

        return response()->json($post, 200);
    }

    /**
     * DELETE Method '/api/posts/{id}'.
     * Returns Status Code 204 'No Content.
     */
    public function destroy(string $id): JsonResponse {

        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(null, 204);
    }

}