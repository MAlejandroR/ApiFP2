<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('family', App\Http\Controllers\FamilyController::class);

Route::apiResource('project', App\Http\Controllers\ProjectController::class);

Route::apiResource('entity', App\Http\Controllers\EntityController::class);

Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::apiResource('technology', App\Http\Controllers\TechnologyController::class);

Route::apiResource('favourite', App\Http\Controllers\FavouriteController::class);

Route::apiResource('implement', App\Http\Controllers\ImplementController::class);

Route::apiResource('collaboration', App\Http\Controllers\CollaborationController::class);


Route::get('family/methods', [App\Http\Controllers\FamilyController::class, 'methods']);
Route::apiResource('family', App\Http\Controllers\FamilyController::class);

Route::get('project/methods', [App\Http\Controllers\ProjectController::class, 'methods']);
Route::apiResource('project', App\Http\Controllers\ProjectController::class);

Route::get('entity/methods', [App\Http\Controllers\EntityController::class, 'methods']);
Route::apiResource('entity', App\Http\Controllers\EntityController::class);

Route::get('user/methods', [App\Http\Controllers\UserController::class, 'methods']);
Route::apiResource('user', App\Http\Controllers\UserController::class);

Route::get('technology/methods', [App\Http\Controllers\TechnologyController::class, 'methods']);
Route::apiResource('technology', App\Http\Controllers\TechnologyController::class);

Route::get('favourite/methods', [App\Http\Controllers\FavouriteController::class, 'methods']);
Route::apiResource('favourite', App\Http\Controllers\FavouriteController::class);

Route::get('implement/methods', [App\Http\Controllers\ImplementController::class, 'methods']);
Route::apiResource('implement', App\Http\Controllers\ImplementController::class);

Route::get('collaboration/methods', [App\Http\Controllers\CollaborationController::class, 'methods']);
Route::apiResource('collaboration', App\Http\Controllers\CollaborationController::class);
