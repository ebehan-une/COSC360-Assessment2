<?php

namespace App\Http\Controllers;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list() {
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function edit(string $id) {
        $header = "Edit Category";
        $category = Category::findOrFail($id);
        return view('admin.categories.create', ['header' => $header, 'category' => $category]);
    }

    public function create() {
        $header = "Create New Category";
        $category = new Category();
        return view('admin.categories.create', ['header' => $header, 'category' => $category]);
    }

    public function save(CategoryRequest $request) {
        $validated = $request->validated();

        if(isset($request->id)) {
            $category = Category::findOrFail($request->id);
        } else {
            $category = new Category();
        }

        $category->name = $validated['name'];
        $category->content = $validated['content'];

        $category->save();

        return redirect()->route('admin.categories.index')->with('message', 'Category Was Saved Successfully!');
    }

    public function delete(string $id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('message', 'Category Was Deleted Successfully!');
    }
}