<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamilyControllerStoreRequest;
use App\Http\Requests\FamilyControllerUpdateRequest;
use App\Http\Resources\FamilyCollection;
use App\Http\Resources\FamilyResource;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FamilyController extends Controller
{
    public function index(Request $request): FamilyCollection
    {
        $families = Family::all();

        return new FamilyCollection($families);
    }

    public function store(FamilyControllerStoreRequest $request): FamilyResource
    {
        $family = Family::create($request->validated());

        return new FamilyResource($family);
    }

    public function show(Request $request, Family $family): FamilyResource
    {
        return new FamilyResource($family);
    }

    public function update(FamilyControllerUpdateRequest $request, Family $family): FamilyResource
    {
        $family->update($request->validated());

        return new FamilyResource($family);
    }

    public function destroy(Request $request, Family $family): Response
    {
        $family->delete();

        return response()->noContent();
    }


}
