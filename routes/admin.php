<?php

use App\Http\Controllers\AdminController;
use App\Http\Livewire\Admin\Students\AddStudents;
use App\Http\Livewire\Ahmed;
use App\Http\Livewire\Admin\Settings\Settings;
use App\Http\Livewire\Admin\Students\EditStudent;
use App\Http\Livewire\Admin\Students\ShowStudents;
use App\Http\Livewire\Admin\Subjects\AddSubject;
use App\Http\Livewire\Admin\Subjects\AddSubjectCategory;
use App\Http\Livewire\Admin\Subjects\EditSubject;
use App\Http\Livewire\Admin\Subjects\EditSubjectCategory;
use App\Http\Livewire\Admin\Subjects\ShowSubjects;
use App\Http\Livewire\Admin\Subjects\SubjectCategory;
use App\Http\Livewire\Admin\Supervisor\AddSupervisor;
use App\Http\Livewire\Admin\Supervisor\EditSupervisor;
use App\Http\Livewire\Admin\Supervisor\ShowSupervisor;
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




Route::middleware('admin:admin')->group(function(){
    Route::get('/login',[AdminController::class,'loginForm'])->name('admin.form');
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,admin','auth:admin',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard')->middleware('auth:admin');
    Route::get('/test',Ahmed::class);


    Route::get('/add-student',AddStudents::class)->name('admin.add-student');
    Route::get('/all-student',ShowStudents::class)->name('admin.show-student');
    Route::get('/edit-student/{id}',EditStudent::class)->name('admin.edit-student');


    Route::get('/all-supervisor',ShowSupervisor::class)->name('admin.show-supervisor');
    Route::get('/add-supervisor',AddSupervisor::class)->name('admin.add-supervisor');
    Route::get('/edit-supervisor/{id}',EditSupervisor::class)->name('admin.edit-supervisor');

    Route::get('/all-subject',ShowSubjects::class)->name('admin.show-subject');
    Route::get('/add-subject',AddSubject::class)->name('admin.add-subject');
    Route::get('/edit-subject/{id}',EditSubject::class)->name('admin.edit-subject');

    Route::get('/add-subject-category',AddSubjectCategory::class)->name('admin.add-subject-category');
    Route::get('/all-subject-category',SubjectCategory::class)->name('admin.show-subject-category');
    Route::get('/edit-subject-category/{id}',EditSubjectCategory::class)->name('admin.edit-subject-category');

    Route::get('/settings',Settings::class)->name('admin.settings');

    Route::get('/test1',AddSemester::class)->name('admin.test1');
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

