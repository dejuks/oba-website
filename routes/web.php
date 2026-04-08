<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('vacancies')->name('vacancies.')->group(function (): void {
    Route::get('/', [VacancyController::class, 'index'])->name('index');
    Route::get('/{vacancy:slug}', [VacancyController::class, 'show'])->name('show');
});

Route::prefix('bills')->name('bills.')->group(function (): void {
    Route::get('/', [BillController::class, 'index'])->name('index');
    Route::get('/{bill:slug}', [BillController::class, 'show'])->name('show');
});

Route::prefix('news')->name('news.')->group(function (): void {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{article:slug}', [NewsController::class, 'show'])->name('show');
});

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
