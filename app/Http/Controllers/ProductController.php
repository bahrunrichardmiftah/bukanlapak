<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function index()
    {
        $products = Product::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "products",
            "result" => $products
        ];

        return response()->json($output, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $product = Product::create($input);

        return response()->json($product, 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $product->fill($input);
        $product->save();

        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        
        if (!$product) {
            abort(404);
        }

        $product->delete();
        $message = ["Pesan" => "Hapus halaman berhasil", "product_id" => $id];

        return response()->json($message, 200);
    }
}
