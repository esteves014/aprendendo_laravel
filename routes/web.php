<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::resource('produtos', ProdutoController::class);
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('details');
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('categoria');
// Rotas do Carrinho
Route::prefix('carrinho')->name('cart.')->group(function () {
    Route::get('/', [CarrinhoController::class, 'index'])->name('index');
    Route::post('/adicionar/{produto}', [CarrinhoController::class, 'add'])->name('add');
    Route::put('/atualizar/{produto}', [CarrinhoController::class, 'update'])->name('update');
    Route::delete('/remover/{produto}', [CarrinhoController::class, 'remove'])->name('remove');
    Route::post('/limpar', [CarrinhoController::class, 'clear'])->name('clear');
});

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware(['LogVerificate', 'CheckEmail']);