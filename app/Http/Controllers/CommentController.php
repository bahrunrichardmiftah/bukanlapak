<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CommentController extends BaseController
{
    public function index()
    {
        $comments = Comment::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "comments",
            "result" => $comments
        ];

        return response()->json($output, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $comment = Comment::create($input);

        return response()->json($comment, 200);
    }

    public function show($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            abort(404);
        }

        return response()->json($comment, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $comment = Comment::find($id);

        if (!$comment) {
            abort(404);
        }

        $comment->fill($input);
        $comment->save();

        return response()->json($comment, 200);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        
        if (!$comment) {
            abort(404);
        }

        $comment->delete();
        $message = ["Pesan" => "Hapus halaman berhasil", "comment_id" => $id];

        return response()->json($message, 200);
    }
}
