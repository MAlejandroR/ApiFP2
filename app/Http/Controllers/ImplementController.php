<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImplementControllerStoreRequest;
use App\Http\Requests\ImplementControllerUpdateRequest;
use App\Http\Resources\ImplementCollection;
use App\Http\Resources\ImplementResource;
use App\Models\Implement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImplementController extends Controller
{
    public function index(Request $request): ImplementCollection
    {
        $implements = Implement::all();

        return new ImplementCollection($implements);
    }

    public function store(ImplementControllerStoreRequest $request): ImplementResource
    {
        $implement = Implement::create($request->validated());

        return new ImplementResource($implement);
    }

    public function show(Request $request, Implement $implement): ImplementResource
    {
        return new ImplementResource($implement);
    }

    public function update(ImplementControllerUpdateRequest $request, Implement $implement): ImplementResource
    {
        $implement->update($request->validated());

        return new ImplementResource($implement);
    }

    public function destroy(Request $request, Implement $implement): Response
    {
        $implement->delete();

        return response()->noContent();
    }

}
