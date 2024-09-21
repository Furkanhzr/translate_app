<?php

use App\Http\Controllers\TranslateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TranslateController::class, 'index'])->name('index');
Route::get('languages', [TranslateController::class, 'languages'])->name('languages');
Route::get('detect', [TranslateController::class, 'detect'])->name('detect');
Route::get('translate', [TranslateController::class, 'translate'])->name('translate');
