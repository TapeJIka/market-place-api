<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RatingRequest;
use App\Http\Resources\RatingResource;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RatingResource::collection(Rating::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RatingRequest $request)
    {
        $rating = Rating::create($request->validated());

        return new RatingResource($rating);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new RatingResource(Rating::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RatingRequest $request,$id)
    {
        Rating::find($id)->update($request->validated());

        return new RatingResource(Rating::find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rating = Rating::find($id);
        $rating->delete();
        return new RatingResource($rating);
    }
}
