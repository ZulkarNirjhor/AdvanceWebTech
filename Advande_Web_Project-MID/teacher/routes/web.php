<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

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
    return view('teacher.pages.teacher.login');
});


Route::get('/login',[TeacherController::class,'login'])->name('teacher.login');
Route::post('/login',[TeacherController::class,'loginSubmit'])->name('teacher.login');
Route::get('/dashboard',[TeacherController::class,'dashboard'])->middleware('Validuser')->name('teacher.dashboard');
Route::get('/signout',[TeacherController::class,'signout'])->name('teacher.signout');
Route::get('/changepassword',[TeacherController::class,'changepassword'])->middleware('Validuser')->name('teacher.changepassword');
Route::post('/changepassword',[TeacherController::class,'changepasswordSubmit'])->middleware('Validuser')->name('teacher.changepassword');
Route::get('/changeinformation',[TeacherController::class,'changeinformation'])->middleware('Validuser')->name('teacher.changeinformation');
Route::post('/changeinformation',[TeacherController::class,'changeinformationSubmit'])->middleware('Validuser')->name('teacher.changeinformation');


Route::get('/addcourse',[CourseController::class,'addcourse'])->middleware('Validuser')->name('course.addcourse');
Route::post('/addcourse',[CourseController::class,'addcourseSubmit'])->middleware('Validuser')->name('course.addcourse');

Route::get('/list',[StudentController::class,'list'])->middleware('Validuser')->name('student.list');
Route::get('/addtocart/{id}',[StudentController::class,'addtocart'])->middleware('Validuser')->name('student.addtocart');
Route::get('/showcart',[StudentController::class,'showcart'])->middleware('Validuser')->name('student.showcart');
Route::get('/deletecart',[StudentController::class,'deletecart'])->middleware('Validuser')->name('student.deletecart');
Route::get('/createcourse',[StudentController::class,'createcourse'])->middleware('Validuser')->name('student.createcourse');
Route::get('/seecourse',[CourseController::class,'seecourse'])->middleware('Validuser')->name('course.seecourse');

Route::get('/addstudent',[CourseController::class,'addstudent'])->middleware('Validuser')->name('course.addstudent');
Route::get('/student',[CourseController::class,'student'])->middleware('Validuser')->name('course.student');

Route::get('/searchstudent',[StudentController::class,'searchstudent'])->middleware('Validuser')->name('student.searchstudent');