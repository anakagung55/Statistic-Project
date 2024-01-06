<?php

use App\Http\Controllers\nilaiController;
use App\Http\Controllers\TtestController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('/nilai');
});

Auth::routes();

Route::get('/databergolong', [nilaiController::class, 'databergolong']);
Route::get('/deskripsi', [nilaiController::class, 'deskripsi']);
Route::get('/frekuensi', [nilaiController::class, 'distribusiFrekuensi']);
Route::get('/nilai', [nilaiController::class, 'index'])->name('nilai');
Route::post('/nilai', [nilaiController::class, 'store'])->name('nilai');
Route::delete('/nilai/{dataSiswa}', [nilaiController::class, 'delete'])->name('nilai.delete');
Route::get('/tabelChi', [nilaiController::class, 'getChiSquare']);
Route::post('/tabelChi', [nilaiController::class, 'calculateChiSquare'])->name('chi');
Route::get('/Ttest', [nilaiController::class, 'Ttest'])->name('Ttest');
Route::get('/liliefors', [nilaiController::class, 'liliefors'])->name('liliefors');
Route::get('export/', [nilaiController::class, 'export']);
Route::get('import/', function () {
 return view('import');
});
Route::post('import/', [nilaiController::class, 'import'])->name('import');
Route::get('biserial', [nilaiController::class, 'biserial']);