<?php

namespace App\Http\Controllers\PublicController;

use App\Models\Past;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::with('user')->OrderBy("id", "DESC")->paginate(10)->toArray();

        $response = [
            "total_count" => $posts["total"],
            "limit" => $post["per_page"],
            "pagination" => [
                "next_page" => $posts["next_page_url"],
                "current_page" => $posts["current_page"]
            ],
            "data" => $posts["data"],
            ];

            return response()->json($response, 200);
    }

    /**
     * display the specified resource
     * 
     * @param int @id
     * @return \Illuminate\Http\Response
     */-
    public function show($id)
    {
        $post = Post::with(['user' => function($query){
            $query->select('id', 'name');
        }])->find($id);

        if(!post) {
            abort(404);
        }

        return response()->json($post, 200);
    }
}
?>