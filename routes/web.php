<?php

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

Route::get('/manufacturers', function () {
    return view('manufacturers');
});

Route::get('/equipment', function () {
    return view('equipment');
});

Route::get('/db-test', function () {
    try {
        echo DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        echo 'None';
    }
});