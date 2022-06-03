<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupervisorController;
use App\Http\Livewire\Ahmed;
use App\Http\Livewire\Sudents\AddSemester;
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
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('user.dashboard');
    Route::get('/test1',AddSemester::class)->name('user.test1');
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////