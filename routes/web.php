<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetsController;

Route::get('/', [BudgetsController::class, 'index'])->name('budgets');
Route::get('/budgets', [BudgetsController::class, 'index'])->name('budgets.index');
Route::get('/search', [BudgetsController::class, 'search'])->name('budgets.search');
Route::get('/create', [BudgetsController::class, 'create'])->name('budgets.create');
Route::post('/budgets', [BudgetsController::class, 'store'])->name('budgets.store');
Route::get('/budgets/{id}/', [BudgetsController::class, 'show'])->name('budgets.show');
Route::get('/{id}', [BudgetsController::class, 'edit'])->name('budgets.edit');
Route::post('/bugets/update/{id}', [BudgetsController::class, 'update'])->name('budgets.update');
Route::delete('/destroy/{id}', [BudgetsController::class, 'destroy'])->name('budgets.destroy');
