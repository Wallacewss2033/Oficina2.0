<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetsController;

/* Rota de create direcionando para o método create*/
Route::get('/create', [BudgetsController::class, 'create'])->name('budgets.create');

/* Rota de vizualização direcionando para o método show*/
Route::get('budgets/show/{id}', [BudgetsController::class, 'show'])->name('budgets.show');

/* Rota de pesquisa direcionando para o método show*/
Route::post('/search', [BudgetsController::class, 'search'])->name('budgets.search');

/* Rota de index direcionando para o método index*/
Route::get('/', [BudgetsController::class, 'index'])->name('budgets');
Route::get('/budgets', [BudgetsController::class, 'index'])->name('budgets');

/* Rota de inserção de cadastro no DB direcionando para o método store*/
Route::post('/budgets', [BudgetsController::class, 'store'])->name('budgets.store');

/* Rota de edit direcionando para o método edit*/
Route::get('/{id}', [BudgetsController::class, 'edit'])->name('budgets.edit');

/* Rota de atualização direcionando para o método update*/
Route::post('/bugets/update/{id}', [BudgetsController::class, 'update'])->name('budgets.update');

/* Rota de exclusão direcionando para o método delete*/
Route::delete('/destroy/{id}', [BudgetsController::class, 'destroy'])->name('budgets.destroy');



