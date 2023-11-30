<?php

use App\Http\Controllers\ConcessionnaireController;
use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/apropos', function () {
    return view('apropos');
});  

Route::get('/lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);


Route::controller(ConcessionnaireController::class)->group(function() {
    

    Route::get('/', 'index');
    Route::get('/concessionnaire/create', 'create');
    Route::get('/concessionnaire/{id}', 'show');
    Route::get('/concessionnaire/{id}/edit', 'edit');

    Route::post('/concessionnaire', 'store');
    Route::patch('/concessionnaire/{id}', 'update');
    Route::delete('/concessionnaire/{id}', 'destroy');

    
});

Route::controller(VehiculeController::class)->group(function() {

   Route::get('concessionnaire/vehicule/{concessionnaireId}', 'index');
   Route::get('vehicule/{concessionnaireId}/create', 'create');
    

   Route::post('/vehicule/{concessionnaireId}/{voitureId}', 'store');
   Route::delete('concessionnaire/{concessionnaireId}/vehicule/{vehiculeId}', 'destroy');
   //Route::delete('concessionnaire/vehicule/{concessionnaireId}/vehicule/{voitureId}', 'destroy');
   //Route::patch('concessionnaire/vehicule/{concessionnaireId}/{voitureId}', 'update');


});

//Route::delete('concessionnaire/{concessionnaireId}/vehicule/{vehiculeId}', [VehiculeController::class, 'destroy']);

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
  
    return redirect('/dashboard');
  })->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
  
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
  
Route::get('/profile', function () {
    // This route can only be accessed by confirmed users...
})->middleware('verified');












Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
