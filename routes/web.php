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
Route::get('/basic_details/{var}/{var1}/{var3}', [App\Http\Controllers\Frontend\PageController::class, 'basic_details']);







//gedara


Route::get('/gedara/step2', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'Gedara_step1']);
Route::get('/gedara/step3', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'step3']);
Route::post('/Gedara/basic_details', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'basic_details']);
Route::post('/step2/data/gedara', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'step2']);
Route::post('/step3/data/gedara', [App\Http\Controllers\Frontend\Gedara\GedaraController::class, 'Finlstep']);

//3rdparty
Route::post('/thirdparty/basic_details', [App\Http\Controllers\Frontend\Thirdparty\ThirdPartyController::class, 'basic_details']);
Route::get('/thirdparty/step2', [App\Http\Controllers\Frontend\Thirdparty\ThirdPartyController::class, 'step1']);
Route::post('/step3/data/thirdparty', [App\Http\Controllers\Frontend\Thirdparty\ThirdPartyController::class, 'Finlstep']);


//Seriouse Ilness
Route::post('/serious-illness/basic_details', [App\Http\Controllers\Frontend\SeriousIlness\SeriousIlnessController::class, 'basic_details']);
Route::get('/serious-illness/step2', [App\Http\Controllers\Frontend\SeriousIlness\SeriousIlnessController::class, 'step1']);
Route::post('/step3/data/serious_illness', [App\Http\Controllers\Frontend\SeriousIlness\SeriousIlnessController::class, 'Finlstep']);

//hospital cover
Route::post('/hospitalization/basic_details', [App\Http\Controllers\Frontend\Hospitalization\HospitalizationController::class, 'basic_details']);
Route::get('/hospitalization/step2', [App\Http\Controllers\Frontend\Hospitalization\HospitalizationController::class, 'step1']);
Route::post('/step3/data/hospitalization', [App\Http\Controllers\Frontend\Hospitalization\HospitalizationController::class, 'Finlstep']);

//visa cover
Route::post('/visa/basic_details', [App\Http\Controllers\Frontend\VisaCard\VisaCarSeriousIlnessController::class, 'basic_details']);
Route::get('/visa/step2', [App\Http\Controllers\Frontend\VisaCard\VisaCarSeriousIlnessController::class, 'step1']);
Route::post('/step3/data/visa', [App\Http\Controllers\Frontend\VisaCard\VisaCarSeriousIlnessController::class, 'Finlstep']);




//response
Route::get('/success', [App\Http\Controllers\Frontend\PageController::class, 'success']);
Route::get('/fail', [App\Http\Controllers\Frontend\PageController::class, 'fail']);
Route::get('/responseURL', [App\Http\Controllers\Frontend\PageController::class, 'responseURL'])->name('view-frontend-VIPHUB-payment-response');;
