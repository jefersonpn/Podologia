<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\AnamnesiController;
use App\Http\Controllers\PatologyController;
use App\Http\Controllers\PePerfusaoController;
use App\Http\Controllers\ObsProfissionalController;

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

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');
Auth::routes();

// PATHOLOGY -----------------------------------------------//
Route::resource('patology', PatologyController::class);
// END PATHOLOGY -------------------------------------------//

// PACIENT-----------------------------------------------------------//
Route::resource('pacient', PacientController::class);
// END PACIENT-------------------------------------------------------// 

// ANAMNESI-----------------------------------------------------------//
Route::get('anamnesi/create/{pacient}', [AnamnesiController::class, 'create'])->name('anamnesi.create');
Route::post('anamnesi/store', [AnamnesiController::class, 'store'])->name('anamnesi.store');
Route::get('anamnesi/{pacient}', [AnamnesiController::class, 'show'])->name('anamnesi.show');
Route::put('anamnesi/{anamnesi}', [AnamnesiController::class, 'update'])->name('anamnesi.update');

// END ANAMNESI-------------------------------------------------------// 

Route::post('obsProf/store', [ObsProfissionalController::class, 'store'])->name('obsProf.store');
Route::put('obsProf/{obsProf}', [ObsProfissionalController::class, 'update'])->name('obsProf.update');

// ESTADOS------------------------------------------------------------//
Route::get('estados_show', [EstadoController::class, 'show']);
// END ESTADOS--------------------------------------------------------//

// CIDADES-----------------------------------------------------------------//
Route::get('cidades_show/{id_estado}', [CidadeController::class, 'show']);
Route::get('cidades/{cidade}', [CidadeController::class, 'edit']);
// END CIDADES-------------------------------------------------------------//

// ANAMINESE-----------------------------------------------------------------//
Route::get('/obs_prof/create/{pacient}', [ObsProfissionalController::class, 'create'])->name('obsProf.create');
// END ANAMINESE-------------------------------------------------------------//

// PE_PERFUSAO-----------------------------------------------------------------//
Route::post('/perfusao/store', [PePerfusaoController::class, 'store'])->name('peperfusao.store');
Route::delete('/perfusao/delete', [PePerfusaoController::class, 'destroy'])->name('peperfusao.delete');

// END PE_PERFUSAO-------------------------------------------------------------//


Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'App\Http\Controllers\UserController', [
        'except' => ['show'],
    ]);
    Route::get('profile', [
        'as' => 'profile.edit',
        'uses' => 'App\Http\Controllers\ProfileController@edit',
    ]);
    Route::put('profile', [
        'as' => 'profile.update',
        'uses' => 'App\Http\Controllers\ProfileController@update',
    ]);
    Route::get('upgrade', function () {
        return view('pages.upgrade');
    })->name('upgrade');
    Route::get('map', function () {
        return view('pages.maps');
    })->name('map');
    Route::get('icons', function () {
        return view('pages.icons');
    })->name('icons');
    Route::get('table-list', function () {
        return view('pages.tables');
    })->name('table');
    Route::put('profile/password', [
        'as' => 'profile.password',
        'uses' => 'App\Http\Controllers\ProfileController@password',
    ]);
});