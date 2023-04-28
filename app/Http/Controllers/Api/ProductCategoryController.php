<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ProductCategoryResource::collection(ProductCategory::filter($request->all())
            ->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        $category = ProductCategory::create($request->validated());

        return new ProductCategoryResource($category);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new ProductCategoryResource(ProductCategory::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request,$id)
    {
        ProductCategory::find($id)->update($request->validated());

        return new ProductCategoryResource(ProductCategory::find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ProductCategory::find($id);
        $category->delete();
        return new ProductCategoryResource($category);
    }
}
