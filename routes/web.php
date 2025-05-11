<?php

use App\Http\Controllers\Admin\AdminOptionsController;
use App\Http\Controllers\Admin\AdminPropertiesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('properties', AdminPropertiesController::class)->except('show');
    Route::resource('options', AdminOptionsController::class)->except('show');
});
