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
Route::get('/basic_details/{var}', [App\Http\Controllers\Frontend\PageController::class, 'basic_details']);







//gedara


Route::get('/gedara/step2', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'Gedara_step1']);
Route::get('/gedara/step3', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'step3']);
Route::post('/Gedara/basic_details', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'basic_details']);
Route::post('/step2/data/gedara', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'step2']);
Route::post('/step3/data/gedara', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'Finlstep']);

//3rdparty
Route::post('/thirdparty/basic_details', [App\Http\Controllers\Frontend\Thirdparty\ThirdPartyController::class, 'basic_details']);
Route::get('/thirdparty/step2', [App\Http\Controllers\Frontend\Thirdparty\ThirdPartyController::class, 'step1']);
