<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('student/all', [StudentController::class, 'getDataStudent'])->name('students.all');

Route::get('student/all/', [StudentController::class, 'getStudentAll'])->name('students.all');

Route::post('student/create', [StudentController::class, 'store'])->name('students.store');

Route::put('student/update/{id}', [StudentController::class, 'update'])->name('students.update');

Route::delete('student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');