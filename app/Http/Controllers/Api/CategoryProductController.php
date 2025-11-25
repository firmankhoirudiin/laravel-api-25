<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;


class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = CategoryProduct::all();
        return response()->json($productCategories); 
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);
        $productCategory = CategoryProduct::create($validatedData);
        return response()->json($productCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productCategory = CategoryProduct::find($id);
        if (!$productCategory) {
            return response()->json(['message' => 'Product category not found'], 404);
        }
        return response()->json($productCategory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
        ]);
        $productCategory = CategoryProduct::find($id);
        if (!$productCategory) {
            return response()->json(['message' => 'Product category not found'], 404);
        }
        $productCategory->update($validatedData);
        return response()->json($productCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productCategory = CategoryProduct::find($id);
        if (!$productCategory) {
            return response()->json(['message' => 'Product category not found'], 404);
        }
        $productCategory->delete();
        return response()->json(['message' => 'wes kehapos bro']);      
    }
}
