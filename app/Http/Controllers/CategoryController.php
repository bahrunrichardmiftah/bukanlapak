<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Client\ResponseSequence;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return response()->json($categories, 200);
    }

    public function show($id)
    {
        $category = Category::find($id);

        return response()->json($category, 200);
    }

    public function store()
    {
        $attr = request()->all();
        $attr['slug'] = Str::slug(request('name'));
        $category = Category::create($attr);

        return response()->json($category, 200);
    }

    public function update($id)
    {
        $category = Category::find($id);

        $category->name = request('name');
        $category->slug = Str::slug(request('name'));

        $category->save;

        return response()->json($category, 200);
    }

    public function delete($id)
    {
        $category = Category::find($id);

        $category->delete();
        $message = ['message' => 'delete successfully', 'Category_id' => $id];
        return response()->json($message, 200);
    }
}
