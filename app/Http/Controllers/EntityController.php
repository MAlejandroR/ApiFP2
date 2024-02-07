<?php

namespace App\Http\Controllers;

use App\Http\Requests\EntityControllerStoreRequest;
use App\Http\Requests\EntityControllerUpdateRequest;
use App\Http\Resources\EntityCollection;
use App\Http\Resources\EntityResource;
use App\Models\Entity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EntityController extends Controller
{
    public function index(Request $request): EntityCollection
    {
        $entities = Entity::all();

        return new EntityCollection($entities);
    }

    public function store(EntityControllerStoreRequest $request): EntityResource
    {
        $entity = Entity::create($request->validated());

        return new EntityResource($entity);
    }

    public function show(Request $request, Entity $entity): EntityResource
    {
        return new EntityResource($entity);
    }

    public function update(EntityControllerUpdateRequest $request, Entity $entity): EntityResource
    {
        $entity->update($request->validated());

        return new EntityResource($entity);
    }

    public function destroy(Request $request, Entity $entity): Response
    {
        $entity->delete();

        return response()->noContent();
    }


}
