<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/manufacturers', ManufacturerController::class);
Route::get('/equipment/{equipment}/addNote', [EquipmentController::class, 'addNote'])->name('equipment.addNote');
Route::put('/equipment/{equipment}/updateNotes', [EquipmentController::class, 'updateNotes'])->name('equipment.updateNotes');
Route::put('/equipment/{equipment}/deleteNote/{note}', [EquipmentController::class, 'deleteNote'])->name('equipment.deleteNote');
Route::resource('/equipment', EquipmentController::class);
Route::resource('/purchases', PurchaseController::class);


Route::get('/db-test', function () {
    try {
        echo DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        echo 'None';
    }
});