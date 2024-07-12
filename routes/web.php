<?php

use App\Http\Controllers\PegawaiController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return view('page.dashboard', [
        'title' => 'Halaman Dashboard',
    ]);
}); 

Route::get('data-pegawai', [PegawaiController::class,'index'])->name('pegawai');
route::get('data-pegawai/create',[PegawaiController::class,'create'])->name('pegawai.tambah');
route::post('data-pegawai/store',[PegawaiController::class,'store'])->name('pegawai.store');
route::get('data-pegawai/{id}/edit',[PegawaiController::class,'edit'])->name('pegawai.edit');
Route::put('data-pegawai/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('data-pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('destroy');