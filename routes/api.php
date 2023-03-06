<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\productController;



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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('products', [productController::class, 'index']);
Route::post('product/addproduct', [productController::class, 'store']);
Route::get('product/{id}', [productController::class, 'show']);
Route::get('product/edit/{id}', [productController::class, 'edit']);
Route::put('product/edit/{id}', [productController::class, 'update']);
Route::delete('product/delete/{id}', [productController::class, 'destroy']);
