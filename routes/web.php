<?php

use App\Http\Controllers\AdmitCardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admit.create');
});

Route::get('/admit/create', [AdmitCardController::class, 'create'])->name('admit.create');
Route::post('/admit/store', [AdmitCardController::class, 'store'])->name('admit.store');

Route::get('/admit/list', [AdmitCardController::class, 'index'])->name('admit.list');
Route::get('/admit/pdf/{id}', [AdmitCardController::class, 'downloadPDF'])->name('admit.pdf');

Route::get('/admit/edit/{id}', [AdmitCardController::class, 'edit'])->name('admit.edit');
Route::put('/admit/update/{id}', [AdmitCardController::class, 'update'])->name('admit.update');
Route::delete('/admit/delete/{id}', [AdmitCardController::class, 'destroy'])->name('admit.destroy');

