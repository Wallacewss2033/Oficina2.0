<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetsController;


Route::get('/create', [BudgetsController::class, 'create'])->name('budgets.create');
Route::get('budgets/show/{id}', [BudgetsController::class, 'show'])->name('budgets.show');
Route::post('/search', [BudgetsController::class, 'search'])->name('budgets.search');
Route::get('/', [BudgetsController::class, 'index'])->name('budgets');
Route::get('/budgets', [BudgetsController::class, 'index'])->name('budgets');
Route::post('/budgets', [BudgetsController::class, 'store'])->name('budgets.store');
Route::get('/{id}', [BudgetsController::class, 'edit'])->name('budgets.edit');
Route::post('/bugets/update/{id}', [BudgetsController::class, 'update'])->name('budgets.update');
Route::delete('/destroy/{id}', [BudgetsController::class, 'destroy'])->name('budgets.destroy');



