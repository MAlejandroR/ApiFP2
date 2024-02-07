<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnologyControllerStoreRequest;
use App\Http\Requests\TechnologyControllerUpdateRequest;
use App\Http\Resources\TechnologyCollection;
use App\Http\Resources\TechnologyResource;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TechnologyController extends Controller
{
    public function index(Request $request): TechnologyCollection
    {
        $technologies = Technology::all();

        return new TechnologyCollection($technologies);
    }

    public function store(TechnologyControllerStoreRequest $request): TechnologyResource
    {
        $technology = Technology::create($request->validated());

        return new TechnologyResource($technology);
    }

    public function show(Request $request, Technology $technology): TechnologyResource
    {
        return new TechnologyResource($technology);
    }

    public function update(TechnologyControllerUpdateRequest $request, Technology $technology): TechnologyResource
    {
        $technology->update($request->validated());

        return new TechnologyResource($technology);
    }

    public function destroy(Request $request, Technology $technology): Response
    {
        $technology->delete();

        return response()->noContent();
    }


}
