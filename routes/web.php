<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Models\ulasan;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [LoginController::class, 'register']);
route::get('/ulasan',[UlasanController::class, 'index'])->name('ulasan');
route::get('/tambahulasan',[UlasanController::class, 'tambahulasan'])->name('tambahulasan');
route::post('/insertdataulasan',[UlasanController::class, 'insertdataulasan'])->name('insertdataulasan');
route::get('/tampilkandataulasan/{id}',[UlasanController::class, 'tampilkandataulasan'])->name('tampilkandataulasan');
route::post('/updatedata/{id}',[UlasanController::class, 'updatedata'])->name('updatedata');
route::get('/deletedata/{id}',[UlasanController::class, 'deletedata'])->name('deletedata');

route::get('/kategori',[KategoriController::class,'index'])->name('index');
