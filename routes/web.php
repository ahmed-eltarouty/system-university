<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupervisorController;
use App\Http\Livewire\Admin\Notification;
use App\Http\Livewire\Ahmed;
use App\Http\Livewire\Students\AddSemester;
use App\Http\Livewire\Students\EditInfo;
use App\Http\Livewire\Students\StudentsDashboard;
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
    Route::get('/dashboard',StudentsDashboard::class)->name('user.dashboard');

    Route::get('/add-semester',AddSemester::class)->name('user.add-semester');
    Route::get('/edit',EditInfo::class)->name('user.edit');

    Route::get('/notifications',Notification::class)->name('user.notifications');

});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
