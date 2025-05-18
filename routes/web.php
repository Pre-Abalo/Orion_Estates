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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/biens', [\App\Http\Controllers\PropertiesController::class, 'index'])->name('properties.index');
Route::get('/biens/{slug}-{property}', [\App\Http\Controllers\PropertiesController::class, 'show'])->name('properties.show')->where([
    'property' => '[0-9]+',
    'slug' => '[0-9a-z\-]+'
]);

Route::name('auth.')->group(function () {
   Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login')->middleware('guest');
   Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);
   Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('properties', AdminPropertiesController::class)->except('show');
    Route::resource('options', AdminOptionsController::class)->except('show');
});
