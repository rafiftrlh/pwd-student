<?php

use App\Http\Controllers\StudentController;
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

Route::get("students/update/{id}", [StudentController::class, "update"])->name("student.update");

Route::get("/", function () {
    view("pages.index");
});

Route::get('/student_table', [StudentController::class, "index"])->name("students.all");

Route::get('create', [StudentController::class, "create"])->name("create");