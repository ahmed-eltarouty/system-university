<?php

use App\Http\Controllers\SupervisorController;
use App\Http\Livewire\Supervisor\ShowStudentDetails;
use App\Http\Livewire\Supervisor\ShowStudents;
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




Route::middleware('supervisor:supervisor')->group(function(){
    Route::get('/login',[SupervisorController::class,'loginForm']);
    Route::post('/login',[SupervisorController::class,'store'])->name('supervisor.login');
});


Route::middleware(['auth:sanctum,supervisor',config('jetstream.auth_session'),'verified'])->group(function () {


    Route::get('/dashboard', ShowStudents::class)->name('dashboard');
    Route::get('/show-students/{id}', ShowStudentDetails::class)->name('show-student.details');
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

