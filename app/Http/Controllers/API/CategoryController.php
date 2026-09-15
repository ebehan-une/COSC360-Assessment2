<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

/**
 * CategoryController.
 * 
 * Handles all incoming API requests from ReactJS front-end.
 */
class CategoryController extends Controller
{
    /**
     * GET Method '/api/categories'.
     * Returns Status Code 200 'OK'.
     */
    public function index(): JsonResponse {

        $categories = Category::all();

        return response()->json($categories, 200);

    }

    /**
     * POST Method '/api/categories'.
     * Returns Status Code 201 'Created'.
     */
    public function store(CategoryRequest $request): JsonResponse {

        $validated = $request->validated();

        $category = new Category();
        $category->name = $validated['name'];
        $category->content = $validated['content'];
        $category->save();

        return response()->json($category, 201);

    }
    
    /**
     * GET Method '/api/categories/{id}'.
     * Returns Status Code 200 'OK'.
     */
    public function show(string $id): JsonResponse {

        $category = Category::findOrFail($id);

        return response()->json($category, 200);

    }

    /**
     * PUT Method '/api/categories/{id}'.
     * Returns Status Code 200 'OK'.
     */
    public function update(CategoryRequest $request, string $id): JsonResponse {

        $validated = $request->validated();
        
        $category = Category::findOrFail($id);
        $category->name = $validated['name'];
        $category->content = $validated['content'];
        $category->save();

        return response()->json($category, 200);
    }

    /**
     * DELETE Method '/api/categories/{id}'.
     * Returns Status Code 204 'No Content.
     */
    public function destroy(string $id): JsonResponse {

        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(null, 204);
    }

}