<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsControllerApi;
use App\Http\Controllers\CategoriesControllerApi;
use App\Http\Controllers\AdsControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// tags routes
Route::resource('tags',TagsControllerApi::class);
Route::get('/search-by-tag',[AdsControllerApi::class, 'filterByTag']);

// categories routes
Route::resource('categories',CategoriesControllerApi::class);
Route::get('/search-by-category',[AdsControllerApi::class, 'filterByCategory']);


