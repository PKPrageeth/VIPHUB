<?php

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

Route::get('/hhhh', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\Frontend\PageController::class, 'indexPage']);
Route::get('index/{var}', [App\Http\Controllers\Frontend\PageController::class, 'categoryLoad']);
Route::get('/basic_details', [App\Http\Controllers\Frontend\PageController::class, 'basic_details']);
Route::get('/Gedara/basic_details', [App\Http\Controllers\Frontend\PageController::class, 'Gedara_step1']);
Route::post('/step2', [App\Http\Controllers\Frontend\PageController::class, 'step2']);

