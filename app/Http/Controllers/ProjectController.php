<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectControllerStoreRequest;
use App\Http\Requests\ProjectControllerUpdateRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index(Request $request): ProjectCollection
    {
        $projects = Project::all();

        return new ProjectCollection($projects);
    }

    public function store(ProjectControllerStoreRequest $request): ProjectResource
    {
        $project = Project::create($request->validated());

        return new ProjectResource($project);
    }

    public function show(Request $request, Project $project): ProjectResource
    {
        return new ProjectResource($project);
    }

    public function update(ProjectControllerUpdateRequest $request, Project $project): ProjectResource
    {
        $project->update($request->validated());

        return new ProjectResource($project);
    }

    public function destroy(Request $request, Project $project): Response
    {
        $project->delete();

        return response()->noContent();
    }


}
