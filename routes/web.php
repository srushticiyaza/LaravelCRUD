<?php

use App\Http\Controllers\democontroller;
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

Route::get('/', [democontroller::class, 'index'])->name('demo.index');
Route::get('demo/create', [democontroller::class, 'create'])->name('demo.create');
Route::post('demo/store', [democontroller::class, 'store'])->name('demo.store');
Route::get('demo/{id}/edit', [democontroller::class, 'edit']);
Route::put('demo/{id}/update', [democontroller::class, 'update']);
Route::delete('demo/{id}/delete', [democontroller::class, 'destroy'])->name('demo.delete');
