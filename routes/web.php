<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TempatController;

use App\Models\ulasan;
use Illuminate\Foundation\Auth\User;

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

//halaman Admin
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/artikel', function () {
    return view('post.post');
});
Route::get('/', function () {
    return view('user.index');
});


//login

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');
route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
route::get('/logout',[LoginController::class, 'logout'])->name('logout');

//ulasan

route::get('/ulasan',[UlasanController::class, 'index'])->name('ulasan')->middleware('auth');
route::get('/tambahulasan',[UlasanController::class, 'tambahulasan'])->name('tambahulasan')->middleware('auth');
route::post('/insertdataulasan',[UlasanController::class, 'insertdataulasan'])->name('insertdataulasan')->middleware('auth');
route::get('/tampilkandataulasan/{id}',[UlasanController::class, 'tampilkandataulasan'])->name('tampilkandataulasan')->middleware('auth');
route::post('/updatedata/{id}',[UlasanController::class, 'updatedata'])->name('updatedata')->middleware('auth');;
route::get('/deletedata/{id}',[UlasanController::class, 'deletedata'])->name('deletedata')->middleware('auth');;

//kategori

route::get('/kategori',[KategoriController::class,'index'])->name('kategori')->middleware('auth');
route::get('/tambahkategori',[KategoriController::class,'tambahkategori'])->name('tambahkategori')->middleware('auth');
route::post('/insertdatakategori',[KategoriController::class, 'insertdatakategori'])->name('insertdatakategori')->middleware('auth');
route::get('/tampilkandatakategori/{id}',[KategoriController::class, 'tampilkandatakategori'])->name('tampilkandatakategori')->middleware('auth');
route::get('/deleted/{id}',[KategoriController::class, 'deleted'])->name('deleted')->middleware('auth');

//tag

route::get('/tag',[TagController::class,'index'])->name('tag')->middleware('auth');
route::get('/tambahtag',[TagController::class,'tambahtag'])->name('tambahtag')->middleware('auth');
route::post('/insertdatatag',[TagController::class, 'insertdatatag'])->name('insertdatatag')->middleware('auth');
route::get('/tampilkandatatag/{id}',[TagController::class, 'tampilkandatatag'])->name('tampilkandatatag')->middleware('auth');
route::get('/deletede/{id}',[TagController::class, 'deletede'])->name('deletede')->middleware('auth');

//user

route::get('/author',[UserController::class,'index'])->name('user')->middleware('auth');
route::get('/deleteda/{id}',[UserController::class, 'deleteda'])->name('deleteda')->middleware('auth');

//laporan

route::get('/laporan',[LaporanController::class,'index'])->name('index')->middleware('auth');
route::get('/deletedp/{id}',[LaporanController::class, 'deletedp'])->name('deletedp')->middleware('auth');

//postingan
route::get('/postingan',[PostinganController::class,'index'])->name('postingan')->middleware('auth');


//data tempat


route::get('/tempat',[TempatController::class, 'index'])->name('tempat')->middleware('auth');
route::get('/tambahtempat',[TempatController::class, 'tambahtempat'])->name('tambahtempat')->middleware('auth');
route::post('/insertdatatempat',[TempatController::class, 'insertdatatempat'])->name('insertdatatempat')->middleware('auth');
route::get('/tampilkandatatempat/{id}',[TempatController::class, 'tampilkandatatempat'])->name('tampilkandatatempat')->middleware('auth');
route::post('/updatetempat/{id}',[TempatController::class, 'updatetempat'])->name('updatetempat')->middleware('auth');;
route::get('/deletetempat/{id}',[TempatController::class, 'deletetempat'])->name('deletetempat')->middleware('auth');;



