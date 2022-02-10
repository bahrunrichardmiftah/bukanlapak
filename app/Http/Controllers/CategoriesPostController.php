<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\CategoriesPost;
use Illuminate\Http\Client\ResponseSequence;

class CategoriesPostController extends Controller
{
    public function index()
    {
        $categoriespost = CategoriesPost::get();

        $output = [
            "message" => "categoriespost",
            "result" => $categoriespost
        ];

        return response()->json($categoriespost, 200);
    }

    public function show($id)
    {
        $categoriespost = CategoriesPost::find($id);

        return response()->json($categoriespost, 200);
    }

    public function store()
    {
        $attr = request()->all();
        $categoriespost = CategoriesPost::create($attr);

        return response()->json($categoriespost, 200);
    }

    public function update($id)
    {
        $categoriespost = CategoriesPost::find($id);

        $categoriespost->name = request('name');

        $categoriespost->save;

        return response()->json($categoriespost, 200);
    }

    public function destroy($id)
    {
        $categorypost = CategoriesPost::find($id);

        if (!$categorypost) {
            abort(404);
        }

        $categorypost->delete();
        $message = ['message' => 'delete successfully', 'categorypost_id' => $id];
        return response()->json($message, 200);
    }
}
