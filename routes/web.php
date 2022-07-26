<?php

// panggil controller 
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\LatihanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route siswa
// Route::resource('siswa', SiswaController::class);

// // route latihan
Route::resource('latihan', LatihanController::class);

// Route::get('test-template', function(){
//     return view('layouts.admin');
// });
Route::group(['prefix'=>'admin','middleware' =>['auth']],
function() {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('siswa', SiswaController::class);
    Route::resource('wali', WaliController::class);
    
});
Route::resource('toko', BarangController::class);
