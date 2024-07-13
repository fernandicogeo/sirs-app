<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
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

Route::get('/', [Controller::class, 'index'])->name('home');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'store'])->name('register.store');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/patient', [PatientController::class, 'index'])->name('dashboard.patient');
    Route::post('/add-patient', [PatientController::class, 'add_patient'])->name('add.patient');
    Route::post('/edit-patient', [PatientController::class, 'edit_patient'])->name('edit.patient');
    Route::post('/delete-patient/{id}', [PatientController::class, 'delete_patient'])->name('delete.patient');

    Route::get('/doctor', [DoctorController::class, 'index'])->name('dashboard.doctor');
    Route::post('/add-doctor', [DoctorController::class, 'add_doctor'])->name('add.doctor');
    Route::post('/edit-doctor', [DoctorController::class, 'edit_doctor'])->name('edit.doctor');
    Route::post('/delete-doctor/{id}', [DoctorController::class, 'delete_doctor'])->name('delete.doctor');

    Route::get('/user', [UserController::class, 'index'])->name('dashboard.user');
    Route::post('/add-user', [UserController::class, 'add_user'])->name('add.user');
    Route::post('/edit-user', [UserController::class, 'edit_user'])->name('edit.user');
    Route::post('/delete-user/{id}', [UserController::class, 'delete_user'])->name('delete.user');

    Route::get('/appointment', [AppointmentController::class, 'index'])->name('dashboard.appointment');
    Route::post('/add-appointment', [AppointmentController::class, 'add_appointment'])->name('add.appointment');
    Route::post('/edit-appointment', [AppointmentController::class, 'edit_appointment'])->name('edit.appointment');
    Route::post('/delete-appointment/{id}', [AppointmentController::class, 'delete_appointment'])->name('delete.appointment');


    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});
