<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class PageController extends BaseController
{
    public function index()
    {
        $pages = Page::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "pages",
            "result" => $pages
        ];

        return response()->json($output, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $page = Page::create($input);

        return response()->json($page, 200);
    }

    public function show($id)
    {
        $page = Page::find($id);

        if (!$page) {
            abort(404);
        }

        return response()->json($page, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $page = Page::find($id);

        if (!$page) {
            abort(404);
        }

        $page->fill($input);
        $page->save();

        return response()->json($page, 200);
    }

    public function destroy($id)
    {
        $page = Page::find($id);
        
        if (!$page) {
            abort(404);
        }

        $page->delete();
        $message = ["Pesan" => "Hapus halaman berhasil", "page_id" => $id];

        return response()->json($message, 200);
    }
}
