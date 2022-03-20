<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::resource('inventories', 'App\Http\Controllers\InventoryController', ['except' => ['create', 'update', 'edit', 'delete']]);
Route::resource('manufacturers', 'App\Http\Controllers\ManufacturerController', ['except' => ['create', 'update', 'edit', 'delete']]);
Route::resource('purchases', 'App\Http\Controllers\PurchaseController', ['except' => ['create', 'update', 'edit', 'delete']]);