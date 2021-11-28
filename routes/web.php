<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
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
// students crud routes
Route::get('/',[StudentController::class,'index']); //index route
//Route::get('/students',[StudentController::class,'index']); // index
Route::get('/students/create',[StudentController::class,'create']); // create route
Route::post('/students/store',[StudentController::class,'store']); 
Route::get('students/show/{id}',[StudentController::class,'show']);
Route::get('students/edit/{id}',[StudentController::class,'edit']);
Route::put('students/update/{id}',[StudentController::class,'update']);
Route::get('students/delete/{id}',[StudentController::class,'destroy']);

 // courses crud routes
Route::get('/courses',[CourseController::class,'index']); //index route
Route::get('/courses/create',[CourseController::class,'create']); // create route
Route::post('/courses/store',[CourseController::class,'store']); 
Route::get('courses/show/{id}',[CourseController::class,'show']);
Route::get('courses/edit/{id}',[CourseController::class,'edit']);
Route::put('courses/update/{id}',[CourseController::class,'update']);
Route::get('courses/delete/{id}',[CourseController::class,'destroy']);