<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;

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
Route::post('insertvariants', [VariantController::class, 'insert']);
Route::post('insertproductcategory', [ProductCategoryController::class, 'insert']);
Route::post('insertproduct', [ProductController::class, 'insert']);
Route::get('getproduct', [ProductController::class, 'select']);