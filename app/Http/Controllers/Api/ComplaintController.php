<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplaintRequest;
use App\Http\Resources\ComplaintResource;
use App\Http\Resources\RatingResource;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ComplaintResource::collection(Complaint::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComplaintRequest $request)
    {
        $complaint = Complaint::create($request->validated());

        return new ComplaintResource($complaint);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return new ComplaintResource(Complaint::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ComplaintRequest $request, $id)
    {
        Complaint::find($id)->update($request->validated());

        return new ComplaintResource(Complaint::find($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $complaint = Complaint::find($id);
        $complaint->delete();
        return new ComplaintResource($complaint);
    }
}
