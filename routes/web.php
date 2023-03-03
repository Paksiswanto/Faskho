<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TempatController;
use App\Models\postingan;
use App\Http\Controllers\TrendController;
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
Route::get('utama1', [KomenController::class, 'index'])->name('index');
Route::post('/insert', [KomenController::class, 'insert'])->name('insert');

// Route::get('/utama1', function () {
//     return view('user.utama1');
// });
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
route::get('/admin',[UserController::class,'showTotalUsers'])->name('showTotalUsers')->middleware('auth');
route::get('/deleteda/{id}',[UserController::class, 'deleteda'])->name('deleteda')->middleware('auth');
Route::put('/updateprofile/{id}',[AuthController::class,'updateprofile']);

//laporan

route::get('/laporan',[LaporanController::class,'index'])->name('index')->middleware('auth');
route::post('/insertdatalaporan',[LaporanController::class,'insertlaporan'])->name('save')->middleware('auth');
route::get('/deletedp/{id}',[LaporanController::class, 'deletedp'])->name('deletedp')->middleware('auth');

//postingan
route::get('/posts',[PostinganController::class,'posts'])->name('posts')->middleware('auth');
Route::get('/show/{id}',[PostinganController::class,'show'])->name('show')->middleware('auth');
Route::get('/tampil/{id}',[PostinganController::class,'tampil'])->name('tampil');
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

//Komentar

Route::resource('comments', App\Http\Controllers\CommentController::class);
<<<<<<< Updated upstream
<<<<<<< HEAD

=======
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
=======
<<<<<<< HEAD
=======
<<<<<<< Updated upstream
=======
>>>>>>> f88e9ef42a0ec8cb3b275acf69b19ea6b770a792
>>>>>>> Stashed changes
<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');

// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');

<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
<<<<<<< HEAD

=======
>>>>>>> Stashed changes
>>>>>>> Stashed changes
>>>>>>> f88e9ef42a0ec8cb3b275acf69b19ea6b770a792
=======
>>>>>>> acc11dcf43e63e3be57d85218fbea5b1e0aaade9
// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');

<<<<<<< HEAD
=======
<<<<<<< Updated upstream
=======
<<<<<<< HEAD

=======
>>>>>>> Stashed changes
>>>>>>> Stashed changes
>>>>>>> f88e9ef42a0ec8cb3b275acf69b19ea6b770a792
>>>>>>> acc11dcf43e63e3be57d85218fbea5b1e0aaade9

//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');
<<<<<<< HEAD
=======
// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//utama
Route::get('/utama',[PostinganController::class,'utama'])->name('utama');

//penutup
Route::get('/penutup',[PostinganController::class,'penutup'])->name('penutup');


// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');
// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
>>>>>>> acc11dcf43e63e3be57d85218fbea5b1e0aaade9
//utama
Route::get('/utama',[PostinganController::class,'utama'])->name('utama');

//penutup
Route::get('/penutup',[PostinganController::class,'penutup'])->name('penutup');

// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');


// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//utama
Route::get('/utama',[PostinganController::class,'utama'])->name('utama');

//penutup
Route::get('/penutup',[PostinganController::class,'penutup'])->name('penutup');

// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');


// Route::get('/posts/{post}/view', [\App\Http\Controllers\PostViewController::class, 'increment']);
//utama
Route::get('/utama',[PostinganController::class,'utama'])->name('utama');
//penutup
Route::get('/penutup',[PostinganController::class,'penutup'])->name('penutup');
//artikel
Route::get('/artikel',[PostinganController::class,'artikel'])->name('artikel');



<<<<<<< Updated upstream

<<<<<<< Updated upstream
<<<<<<< Updated upstream


>>>>>>> Stashed changes

=======
>>>>>>> Stashed changes

=======
<<<<<<< HEAD
//pembuka
Route::get('/pembuka',[PostinganController::class,'pembuka'])->name('pembuka');
//utama
Route::get('/utama',[PostinganController::class,'utama'])->name('utama');

//penutup
Route::get('/penutup',[PostinganController::class,'penutup'])->name('penutup');

=======
<<<<<<< Updated upstream


>>>>>>> Stashed changes
>>>>>>> acc11dcf43e63e3be57d85218fbea5b1e0aaade9

=======
>>>>>>> Stashed changes

>>>>>>> Stashed changes
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
//Trend
Route::get('/trend', [TrendController::class, 'index'])->name('trend');
route::get('/tambahtrend',[TrendController::class, 'tambahtrend'])->name('tambahtrend')->middleware('auth');
route::post('/insertdatatrend',[TrendController::class, 'insertdatatrend'])->name('insertdatatrend')->middleware('auth');
route::get('/tampilkandatatrend/{id}',[TrendController::class, 'tampilkandatatrend'])->name('tampilkandatatrend')->middleware('auth');
route::post('/updatedata/{id}',[TrendController::class, 'updatedata'])->name('updatedata')->middleware('auth');
route::post('/delete/{id}',[TrendController::class, 'delete'])->name('delete')->middleware('auth');

//profile

route::get('/profile',[ProfileController::class,'profile'])->name('profile')->middleware('auth');
<<<<<<< Updated upstream
route::get('/tampillah/{id}',[ProfileController::class,'tampilprofile'])->name('tampilprofile')->middleware('auth');
=======
route::get('/profilku/{id}',[ProfileController::class,'tampilprofile'])->name('tampilprofile')->middleware('auth');
>>>>>>> Stashed changes
route::put('/updatedpo/{id}',[ProfileController::class,'updatedpo'])->name('updatedpo')->middleware('auth');
