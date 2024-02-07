<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollaborationControllerStoreRequest;
use App\Http\Requests\CollaborationControllerUpdateRequest;
use App\Http\Resources\CollaborationCollection;
use App\Http\Resources\CollaborationResource;
use App\Models\Collaboration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CollaborationController extends Controller
{
    public function index(Request $request): CollaborationCollection
    {
        $collaborations = Collaboration::all();

        return new CollaborationCollection($collaborations);
    }

    public function store(CollaborationControllerStoreRequest $request): CollaborationResource
    {
        $collaboration = Collaboration::create($request->validated());

        return new CollaborationResource($collaboration);
    }

    public function show(Request $request, Collaboration $collaboration): CollaborationResource
    {
        return new CollaborationResource($collaboration);
    }

    public function update(CollaborationControllerUpdateRequest $request, Collaboration $collaboration): CollaborationResource
    {
        $collaboration->update($request->validated());

        return new CollaborationResource($collaboration);
    }

    public function destroy(Request $request, Collaboration $collaboration): Response
    {
        $collaboration->delete();

        return response()->noContent();
    }


}
