<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductTypeRequest;
use App\Http\Resources\ProductTypeResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductTypeResource::collection(ProductType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductTypeRequest $request)
    {
        $product_type = ProductType::create($request->validated());

        return new ProductTypeResource($product_type);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new ProductTypeResource(ProductType::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductTypeRequest $request, $id)
    {
        ProductType::find($id)->update($request->validated());

        return new ProductTypeResource(ProductType::find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product_type = ProductType::find($id);
        $product_type->delete();
        return new ProductTypeResource($product_type);
    }
}
