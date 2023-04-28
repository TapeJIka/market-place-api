<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPhotoRequest;
use App\Http\Resources\ProductPhotoResource;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductPhotoResource::collection(ProductPhoto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPhotoRequest $request)
    {
        $validated = $request->validated();
        $image = $validated['image'];
        $validated['image'] = $image->hashName();
        $image->store('public/product_photo/');

        return new ProductPhotoResource(ProductPhoto::create($validated));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new ProductPhotoResource(ProductPhoto::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductPhotoRequest $request,$id)
    {
        $ProductPhoto = ProductPhoto::find($id);
        $validated = $request->validated();
        $ProductPhoto->image= Storage::disk('local')->delete('public/product_photo/'.$ProductPhoto->image);
        $image = $validated['image'];
        $validated['image'] = $image->hashName();
        $image->store('public/point_of_interest_photo/');
        $ProductPhoto->update($validated);
        return new ProductPhotoResource($ProductPhoto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ProductPhoto = ProductPhoto::find($id);
        $ProductPhoto->image= Storage::disk('local')->delete('public/product_photo/'.$ProductPhoto->image);
        $ProductPhoto->delete();
        return new ProductPhotoResource($ProductPhoto);
    }

    public function getFile(ProductPhotoRequest $request, $ProductPhoto){
        if(!$request->hasValidSignature()) return abort(401);
        $ProductPhoto = ProductPhoto::find($ProductPhoto);
        $ProductPhoto->image = Storage::disk('local')->path('public/product_photo/'.$ProductPhoto->image);
        return response()->file($ProductPhoto->image);
    }
}
