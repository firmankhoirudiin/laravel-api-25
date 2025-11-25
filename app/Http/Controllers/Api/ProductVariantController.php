<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductVariant::all();
           return response()->json($products);
   
           return ProductVariant::with('product')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validated = $request->validate([
                'price' => 'required',
                'product_id' => 'required|exists:products,id',
                'variant_name' => 'required',
                'variant_code' => 'required',
                'stock' => 'required'
            ]);
    
            $product = ProductVariant::create($validated);
            return response()->json($product, 201);
    
        } catch(\Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'data'=>null
        ],401);
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = ProductVariant::find($id);
           if (!$product) {
               return response()->json(['message' => 'Produk tidak ditemukan'], 404);
           }
           return response()->json($product);
           return ProductVariant::with('product')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = ProductVariant::find($id);
           if (!$product) {
               return response()->json(['message' => 'Produk tidak ditemukan'], 404);
           }
   
           $validated = $request->validate([
               'price' => 'required',
                   'product_id' => 'required|exists:products,id',
                   'variant_name' => 'required',
                   'variant_code' => 'required',
                   'stock' => 'required'
           ]);
   
           $product->update($validated);
           return response()->json(['message' => 'Produk berhasil diperbarui', 'data' => $product]);
   
           $variant = ProductVariant::findOrFail($id);
           $variant->update($request->all());
   
           return response()->json($variant);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = ProductVariant::find($id);
           if (!$product) {
               return response()->json(['message' => 'Produk tidak ditemukan'], 404);
           }
   
           $product->delete();
           return response()->json(['message' => 'Produk berhasil dihapus']);
           
           ProductVariant::findOrFail($id)->delete();
           return response()->json(['message' => 'Varian Berhasil dihapus']);
    }
}