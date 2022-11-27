<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\PatologyController;





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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();





// PATHOLOGY -----------------------------------------------//
Route::resource('patology', PatologyController::class);
// END PATHOLOGY -------------------------------------------//





// PACIENT-----------------------------------------------------------//
Route::resource('pacient', PacientController::class);
// END PACIENT-------------------------------------------------------//




// ESTADOS------------------------------------------------------------//
Route::get('estados_show', [EstadoController::class, 'show']);
// END ESTADOS--------------------------------------------------------//



// CIDADES-----------------------------------------------------------------//
Route::get('cidades_show/{id_estado}', [CidadeController::class, 'show']);
// END CIDADES-------------------------------------------------------------//




Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});