<?php

use App\Models\kategori;
use App\Models\postingan;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TrendController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;

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


Route::get('/kontak', function () {
    $kat = kategori::all();
    return view('user.kontak',compact('kat'));
});
Route::get('/artikel', function () {
    return view('post.post');
});
Route::get('/pembuka', function () {
    return view('user.pembuka');
});



Route::get('/utama', function () {
    return view('user.utama');
});
Route::post('/insert/{id}', [KomenController::class, 'insert'])->name('insert');
Route::get('/penutup', function () {
    return view('user.penutup');
});

Route::get('/terms', function () {
    return view('post.postingan.terms');
});
Route::group(['middleware' => ['auth', 'hakakses:admin']], function () {
    route::get('/postingan', [PostinganController::class, 'postingan'])->name('postingan');
});



//login

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('forgot-password', [ForgotPasswordController::class, 'showForm'])->name('forgot.password');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot.password.mail');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showForm'])->name('reset.password.form');
Route::post('reset-password',  [ResetPasswordController::class, 'updatepassword'])->name('update.password');
//postingan Controller

Route::get('/', [PostinganController::class, 'litindex'])->name('litindex');
Route::put('/notifications/{id}/read', [PostinganController::class, 'markAsRead'])->name('notifications.markAsRead');

Route::get('/tampil/{id}', [PostinganController::class, 'tampil'])->name('tampil');
Route::get('/like/{id}', [PostinganController::class, 'tampil'])->name('tampil');
Route::get('/kategori/{id}',[PostinganController::class,'kategori2'])->name('kategori2');

Route::get('/pembuka', [PostinganController::class, 'pembuka'])->name('pembuka');
//utama
Route::get('/utama', [PostinganController::class, 'utama'])->name('utama');
//penutup
Route::get('/penutup', [PostinganController::class, 'penutup'])->name('penutup');
//artikel
Route::get('/artikel', [PostinganController::class, 'artikel'])->name('artikel');
Route::get('search', [PostinganController::class, 'search'])->name('search');

//end PostinganController

//Komentar
Route::get('/like/{id}', [Likecontroller::class, 'like']);
Route::resource('comments', App\Http\Controllers\CommentController::class);

// USER
Route::middleware('auth')->group( function(){
    
    //profile
    route::post('/insertdataulasan', [UlasanController::class, 'insertdataulasan'])->name('insertdataulasan');
    route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    route::get('/tampillah/{id}', [ProfileController::class, 'tampilprofile'])->name('tampilprofile');
    route::put('/updatedpo/{id}', [ProfileController::class, 'updatedpo'])->name('updatedpo');
    route::get('/profilku/{id}', [ProfileController::class, 'tampilprofile'])->name('tampilprofile');
    route::put('/updateprofile/{id}', [ProfileController::class, 'updateprofile'])->name('updateprofile');

    //postingan
    route::get('/posts/{id}', [PostinganController::class, 'posts'])->name('posts');
    route::get('/notif/{id}', [PostinganController::class, 'notif'])->name('notif');
    route::get('/hapus/{id}', [PostinganController::class, 'hapus'])->name('hapus');
    route::get('/statistik/{id}', [PostinganController::class, 'showTotalviews'])->name('showTotalviews');
    route::get('/tambahpostingan', [PostinganController::class, 'tambahpostingan'])->name('tambahpostingan');
    route::post('/insertdatapost', [PostinganController::class, 'insertdatapost'])->name('insertdatapost');
    route::get('/tampilkandatapostingan/{id}', [PostinganController::class, 'tampilkandatapostingan'])->name('tampilkandatapostingan');
    route::post('/updt/{id}', [PostinganController::class, 'updt'])->name('updt');
    route::get('/deletepostingan/{id}', [PostinganController::class, 'deletepostingan'])->name('deletepostingan');
    route::get('/deleteps/{id}', [PostinganController::class, 'deleteps'])->name('deleteps');
    route::get('/komenku/{id}', [PostinganController::class, 'komenku'])->name('komenku');
    route::get('/deletekomenku/{id}', [PostinganController::class, 'deletekomenku'])->name('deletekomenku');
    route::post('storeKomentar/{id}', [PostinganController::class, 'storeKomentar'])->name('komentar.store');
    route::post('/comments/{id}/balas', [PostinganController::class, 'balas'])->name('balas');
    Route::get('/show/{id}', [PostinganController::class, 'show'])->name('show');
    
});
Route::middleware('admin')->group(function () {

    route::get('/deletepost/{id}', [PostinganController::class, 'deletepost'])->name('deletepost');
    //diterima
    Route::get('/terima', [PostinganController::class, 'terima'])->name('terima');
    Route::get('/diterima/{id}', [PostinganController::class, 'diterima'])->name('diterima');
    Route::get('/tolak', [PostinganController::class, 'tolak'])->name('tolak');
    Route::post('/ditolak/{id}', [PostinganController::class, 'ditolak'])->name('ditolak');
    //Trend
    Route::get('/trend', [TrendController::class, 'index'])->name('trend');
    route::get('/tambahtrend', [TrendController::class, 'tambahtrend'])->name('tambahtrend');
    route::post('/insertdatatrend', [TrendController::class, 'insertdatatrend'])->name('insertdatatrend');
    route::get('/tampilkandatatrend/{id}', [TrendController::class, 'tampilkandatatrend'])->name('tampilkandatatrend');
    route::post('/updatedata/{id}', [TrendController::class, 'updatedata'])->name('updatedata');
    route::post('/delete/{id}', [TrendController::class, 'delete'])->name('delete');

    //data tempat

    route::get('/tempat', [TempatController::class, 'index'])->name('tempat');
    route::get('/tambahtempat', [TempatController::class, 'tambahtempat'])->name('tambahtempat');
    route::post('/insertdatatempat', [TempatController::class, 'insertdatatempat'])->name('insertdatatempat');
    route::get('/tampilkandatatempat/{id}', [TempatController::class, 'tampilkandatatempat'])->name('tampilkandatatempat');
    route::post('/updatedata/{id}', [TempatController::class, 'updatedata'])->name('updatedata');
    route::post('/delete/{id}', [TempatController::class, 'delete'])->name('delete');

    //ulasan

    route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan');
    route::get('/tambahulasan', [UlasanController::class, 'tambahulasan'])->name('tambahulasan');
    route::get('/tampilkandataulasan/{id}', [UlasanController::class, 'tampilkandataulasan'])->name('tampilkandataulasan');
    route::post('/updatedata/{id}', [UlasanController::class, 'updatedata'])->name('updatedata');;
    route::get('/deletedata/{id}', [UlasanController::class, 'deletedata'])->name('deletedata');;
    route::get('/CRUD', [UlasanController::class, 'CRUD']);

    //kategori

    route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    route::get('/tambahkategori', [KategoriController::class, 'tambahkategori'])->name('tambahkategori');
    route::post('/insertdatakategori', [KategoriController::class, 'insertdatakategori'])->name('insertdatakategori');
    route::get('/tampilkandatakategori/{id}', [KategoriController::class, 'tampilkandatakategori'])->name('tampilkandatakategori');
    route::get('/deleted/{id}', [KategoriController::class, 'deleted'])->name('deleted');

    //user

    route::get('/author', [UserController::class, 'index'])->name('user');
    route::get('/admin', [UserController::class, 'showTotalUsers'])->name('showTotalUsers');
    route::get('/ban', [UserController::class, 'ban'])->name('ban');
    route::get('/deleteda/{id}', [UserController::class, 'deleteda'])->name('deleteda');
    route::get('/ban/{id}', [UserController::class, 'bannedUSer'])->name('bannnedUser');
    route::get('/unban/{id}', [UserController::class, 'unbannedUser'])->name('unbannedUser');


    //laporan

    route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    route::post('/insertdatalaporan', [LaporanController::class, 'insertlaporan'])->name('save');
    route::get('/deletedp/{id}', [LaporanController::class, 'deletedp'])->name('deletedp');


});
