<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        try {
            $products = Product::with('category')->get();

            return response()->json([
                'type' => 'Success',
                'data' => $products
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'type' => 'Error',
                'message' => $e->getMessage()
            ],500);
        }
    }

    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'category_product_id' => 'required|exists:category_products,id',
                'name'                => 'required|max:255',
                'description'         => 'nullable',
                'code'                => 'required|max:255',
                'price'               => 'required|max:255'
            ]);

            $product = Product::create($validated);

            return response()->json($product, 201);

        }catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null
            ],401);
        }
    }

    public function show(string $id)
    {
        try {
            $product = Product::with('category')->findOrFail($id);

            return response()->json([
                'type' => 'Success',
                'data' => $product
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'type'    => 'Error',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $product = Product::findOrFail($id);

            $validated = $request->validate([
                "category_product_id" => 'required|exists:category_products,id',
                "name"                => 'required|string|max:255',
                "description"         => 'nullable|string',
                "code"                => 'required|string|max:50',
                "price"               => 'required',
            ]);

            $product->update($validated);
            $product->load('category');

            return response()->json([
                'type'    => 'Success',
                'message' => 'Product berhasil diubah',
                'data'    => $product
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'type'    => 'Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json([
                'type'    => 'Success',
                'message' => 'Product berhasil dihapus'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'type'    => 'Error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}