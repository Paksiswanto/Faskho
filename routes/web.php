<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

//kategori

route::get('/kategori',[KategoriController::class,'index'])->name('index');
route::get('/tambahkategori',[KategoriController::class,'tambahkategori'])->name('tambahkategori');
route::post('/insertdatakategori',[KategoriController::class, 'insertdatakategori'])->name('insertdatakategori');
route::get('/tampilkandatakategori/{id}',[KategoriController::class, 'tampilkandatakategori'])->name('tampilkandatakategori');
route::get('/deleted/{id}',[KategoriController::class, 'deleted'])->name('deleted');

//tag

route::get('/tag',[TagController::class,'index'])->name('index');
route::get('/tambahtag',[TagController::class,'tambahtag'])->name('tambahtag');
route::post('/insertdatatag',[TagController::class, 'insertdatatag'])->name('insertdatatag');
route::get('/tampilkandatatag/{id}',[TagController::class, 'tampilkandatatag'])->name('tampilkandatatag');
route::get('/deletede/{id}',[TagController::class, 'deletede'])->name('deletede');

//user

route::get('/author',[UserController::class,'index'])->name('index');
route::get('/deleteda/{id}',[TagController::class, 'deleteda'])->name('deleteda');

//laporan

route::get('/laporan',[LaporanController::class,'index'])->name('index');
route::get('/deletedp/{id}',[TagController::class, 'deletedp'])->name('deletedp');
