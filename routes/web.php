<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UlasanController;
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

route::get('/ulasan',[UlasanController::class, 'index'])->name('ulasan');
route::get('/tambahulasan',[UlasanController::class, 'tambahulasan'])->name('tambahulasan');
route::post('/insertdataulasan',[UlasanController::class, 'insertdataulasan'])->name('insertdataulasan');
route::get('/tampilkandataulasan/{id}',[UlasanController::class, 'tampilkandataulasan'])->name('tampilkandataulasan');
route::post('/updatedata/{id}',[UlasanController::class, 'updatedata'])->name('updatedata');
route::get('/deletedata/{id}',[UlasanController::class, 'deletedata'])->name('deletedata');
