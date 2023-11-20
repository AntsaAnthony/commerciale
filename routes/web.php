<?php

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

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('auth.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'doLogin']);

Route::prefix('/comm')->name('comm.')->controller(\App\Http\Controllers\CommController::class)->middleware('auth')->group(function (){
    Route::get('/', 'index')->name('index');
    Route::get('/besoins', 'showProductGroup')->name('needs');
    Route::get('/insertbesoin','AffichBesoin')->name('besoin');
    Route::post('/insertbesoin','insertBesoin');
    Route::get('/demandeProforma', 'insererDemandeProforma')->name('insertProforma');
});

Route::prefix('/provider')->name('fournisseur.')->controller(\App\Http\Controllers\CommController::class)->group(function (){
    Route::get('/', 'index')->name('index');
});

Route::get('/validationBesoins', [\App\Http\Controllers\BesoinController::class,'getBesoins'])->name('besoins.all');
Route::get('/valider', [\App\Http\Controllers\BesoinController::class, 'valider'])->name('besoin.valider');

