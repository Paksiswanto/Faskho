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
})->middleware('auth');

Route::get('/artikel', function () {
    return view('post.post');
})->middleware('auth');
Route::get('/', function () {
    return view('user.index');
});
Route::get('/single1', function () {
    return view('user.single1');
});
Route::get('/pembuka', function () {
    return view('user.pembuka');
});
Route::get('/pembuka1', function () {
    return view('user.pembuka1');
});
Route::get('/utama', function () {
    return view('user.utama');
});
Route::get('/utama1', function () {
    return view('user.utama1');
});
Route::get('/penutup', function () {
    return view('user.penutup');
});
Route::get('/penutup1', function () {
    return view('user.penutup1');
});
Route::get('/kontak', function () {
    return view('user.kontak');
})->middleware('auth');

Route::group(['middleware' => ['auth','hakakses:admin']], function(){
    route::get('/postingan',[PostinganController::class,'index'])->name('postingan');

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
route::get('/CRUD',[UlasanController::class,'CRUD'])->middleware('auth');

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
route::post('/insertdatalaporan',[LaporanController::class,'insertlaporan'])->name('save')->middleware('auth');
route::get('/deletedp/{id}',[LaporanController::class, 'deletedp'])->name('deletedp')->middleware('auth');

//postingan
route::get('/posts',[PostinganController::class,'posts'])->name('posts')->middleware('auth');
route::get('/tambahpostingan',[PostinganController::class,'tambahpostingan'])->name('tambahpostingan')->middleware('auth');
route::post('/insertdatapost',[PostinganController::class,'insertdatapost'])->name('insertdatapost')->middleware('auth');
route::get('/tampilkandatapostingan/{id}',[PostinganController::class,'tampilkandatapostingan'])->name('tampilkandatapostingan')->middleware('auth');
route::post('/updt/{id}',[PostinganController::class, 'updt'])->name('updt')->middleware('auth');
route::get('/deletepostingan/{id}',[PostinganController::class, 'deletepostingan'])->name('deletepostingan')->middleware('auth');


//data tempat


route::get('/tempat',[TempatController::class, 'index'])->name('tempat')->middleware('auth');
route::get('/tambahtempat',[TempatController::class, 'tambahtempat'])->name('tambahtempat')->middleware('auth');
route::post('/insertdatatempat',[TempatController::class, 'insertdatatempat'])->name('insertdatatempat')->middleware('auth');
route::get('/tampilkandatatempat/{id}',[TempatController::class, 'tampilkandatatempat'])->name('tampilkandatatempat')->middleware('auth');
route::post('/updatedata/{id}',[TempatController::class, 'updatedata'])->name('updatedata')->middleware('auth');
route::post('/delete/{id}',[TempatController::class, 'delete'])->name('delete')->middleware('auth');


//







