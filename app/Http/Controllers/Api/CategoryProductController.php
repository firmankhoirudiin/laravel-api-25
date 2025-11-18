<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;

class CategoryProductController extends Controller
{
    //
    public function index()
    {
        $categoryProducts = CategoryProduct::all();
        return response()->json($categoryProducts);
    }
    public function store(Request $request)
    {
        $categoryProduct = CategoryProduct::create($request->all());
        return response()->json($categoryProduct, 201);
    }
    public function show(CategoryProduct $categoryProduct)
    {
        return response()->json($categoryProduct);
    }
    public function update(Request $request, CategoryProduct $categoryProduct)
    {
        
        $categoryProduct->update($request->all());


        return response()->json($categoryProduct);

    }
    public function destroy(CategoryProduct $categoryProduct)
    {
        $categoryProduct->delete();
        return response()->json(null, 204);
    }
}
