<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Api\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/produtos', [ProdutoController::class, "getProdutos"]);
    Route::get('/produto/{id}', [ProdutoController::class, "getProduto"]);
    Route::post('/produto', [ProdutoController::class, "createProduto"]);
    Route::put('/produto/{id}', [ProdutoController::class, "atualizarProduto"]);
    Route::delete('/produto/{id}', [ProdutoController::class, "excluirProduto"]);
});


Route::get('/usuarios', [UsuarioController::class, "getUsuarios"]);
Route::get('/usuario/{id}', [UsuarioController::class, "getUsuario"]);
Route::post('/usuario', [UsuarioController::class, "createUsuario"]);
Route::put('/usuario/{id}', [UsuarioController::class, "atualizarUsuario"]);
Route::delete('/usuario/{id}', [UsuarioController::class, "excluirUsuario"]);

Route::post('/login', [AuthController::class, 'auth']);
