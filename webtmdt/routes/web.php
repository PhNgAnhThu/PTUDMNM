<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ViduLayoutController;
use App\Http\Controllers\SachController;

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
Route::get('/qlsach/theloai', [BookController::class, 'laythongtintheloai']);
Route::get('/qlsach/thongtinsach', [BookController::class, 'laythongtinsach']);
Route::get('/qlsach/nhapdulieu', [BookController::class, 'nhapdulieu']);
Route::get('/qlsach/luudulieu', [BookController::class, 'luudulieu']);

Route::get('/trang1', [ViduLayoutController::class, 'trang1']);
Route::get('/sach', [SachController::class, 'index']);
Route::get('/sach/theloai/{id}', [SachController::class, 'theloai']);
Route::get('/sach/chitiet/{id}', [SachController::class, 'chitiet']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
