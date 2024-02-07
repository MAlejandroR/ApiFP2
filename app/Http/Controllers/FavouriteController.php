<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavouriteControllerStoreRequest;
use App\Http\Requests\FavouriteControllerUpdateRequest;
use App\Http\Resources\FavouriteCollection;
use App\Http\Resources\FavouriteResource;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FavouriteController extends Controller
{
    public function index(Request $request): FavouriteCollection
    {
        $favourites = Favourite::all();

        return new FavouriteCollection($favourites);
    }

    public function store(FavouriteControllerStoreRequest $request): FavouriteResource
    {
        $favourite = Favourite::create($request->validated());

        return new FavouriteResource($favourite);
    }

    public function show(Request $request, Favourite $favourite): FavouriteResource
    {
        return new FavouriteResource($favourite);
    }

    public function update(FavouriteControllerUpdateRequest $request, Favourite $favourite): FavouriteResource
    {
        $favourite->update($request->validated());

        return new FavouriteResource($favourite);
    }

    public function destroy(Request $request, Favourite $favourite): Response
    {
        $favourite->delete();

        return response()->noContent();
    }


}
