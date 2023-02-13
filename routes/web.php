<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\AnamnesiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PatologyController;
use App\Http\Controllers\PePerfusaoController;
use App\Http\Controllers\ObsProfissionalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ServicoController;
use App\Models\Category;
use App\Models\Fornecedor;

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




Route::group(['middleware' => 'auth'], function () {

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

    // FORNECEDOR-----------------------------------------------------------------//
    Route::get('/provider/', [FornecedorController::class, 'index'])->name('provider.index');
    Route::post('/provider/store', [FornecedorController::class, 'store'])->name('provider.store');
    Route::post('/provider/search', [FornecedorController::class, 'requestApi'])->name('provider.showBusca');
    Route::get('/provider/create', [FornecedorController::class, 'create'])->name('provider.create');
    Route::get('/provider/{fornecedor}/edit', [FornecedorController::class, 'edit'])->name('provider.edit');
    Route::delete('/provider/{fornecedor}/delete', [FornecedorController::class, 'destroy'])->name('provider.delete');
    Route::put('/provider/{fornecedor}', [FornecedorController::class, 'update'])->name('provider.update');
    // END FORNECEDOR-------------------------------------------------------------//

    // SERVIÇO-----------------------------------------------------------------//
    Route::get('/servico', [ServicoController::class, 'index'])->name('service.index');
    Route::post('/servico/store', [ServicoController::class, 'store'])->name('service.store');
    Route::post('/servico/search', [ServicoController::class, 'requestApi'])->name('service.showBusca');
    Route::get('/servico/create', [ServicoController::class, 'create'])->name('service.create');
    Route::get('/servico/{servico}/edit', [ServicoController::class, 'edit'])->name('service.edit');
    Route::delete('/servico/{servico}/delete', [ServicoController::class, 'destroy'])->name('service.delete');
    Route::put('/servico/{servico}', [ServicoController::class, 'update'])->name('service.update');
    // END SERVIÇO-------------------------------------------------------------//

    // PRODUTO-----------------------------------------------------------------//
    Route::get('/produto/', [ProdutoController::class, 'index'])->name('product.index');
    Route::post('/produto/store', [ProdutoController::class, 'store'])->name('product.store');
    Route::post('/produto/search', [ProdutoController::class, 'requestApi'])->name('product.showBusca');
    Route::get('/produto/create', [ProdutoController::class, 'create'])->name('product.create');
    Route::get('/produto/{produto}/edit', [ProdutoController::class, 'edit'])->name('product.edit');
    Route::delete('/produto/{produto}/delete', [ProdutoController::class, 'destroy'])->name('product.delete');
    Route::put('/produto/{produto}', [ProdutoController::class, 'update'])->name('product.update');
    // END PRODUTO-------------------------------------------------------------//

    // FINANCEIRO-----------------------------------------------------------------//
    Route::get('/financeiro/', [FinanceiroController::class, 'index'])->name('financeiro.index');
    Route::post('/financeiro/store', [FinanceiroController::class, 'store'])->name('financeiro.store');
    Route::post('/financeiro/search', [FinanceiroController::class, 'requestApi'])->name('financeiro.showBusca');
    Route::get('/financeiro/create', [FinanceiroController::class, 'create'])->name('financeiro.create');
    Route::get('/financeiro/{financeiro}/edit', [FinanceiroController::class, 'edit'])->name('financeiro.edit');
    Route::delete('/financeiro/{financeiro}/delete', [FinanceiroController::class, 'destroy'])->name('financeiro.delete');
    Route::put('/financeiro/{financeiro}', [FinanceiroController::class, 'update'])->name('financeiro.update');
    // END FINANCEIRO-------------------------------------------------------------//

    // CATEGORY---------------------------------------------------------------------------------------//
    Route::get('category', [CategoryController::class, 'show'])->name('category.name');
    Route::post('/produto/create', [CategoryController::class, 'store'])->name('category.store');
    Route::delete('/produto/create/', [CategoryController::class, 'destroy'])->name('category.delete');
    // END CATEGORY----------------------------------------------------------------------------------//

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