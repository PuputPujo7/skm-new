<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\NilaiAnda;
use App\Http\Livewire\NotFound;
use App\Http\Livewire\Pemohon;
use App\Http\Livewire\PemohonIzin;
use App\Http\Livewire\Survey;
use App\Http\Livewire\Terimakasih;
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

// Route::view('/', 'welcome')->name('home');
Route::get('/', Home::class)->name('home');

Route::get('/pemohon', Pemohon::class)->name('pemohon');
Route::get('/pemohon-izin', PemohonIzin::class)->name('pemohon-izin');

Route::get('/survey/{nomorTiket}', Survey::class)->name('survey');

Route::get('/not-found', NotFound::class)->name('notfound');
Route::get('/nilai-anda/{nomorTiket}', NilaiAnda::class)->name('nilai-anda');

Route::get('/thanks', Terimakasih::class)->name('thanks');


