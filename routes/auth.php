<?php
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Auth\LaboratorieEmployeeController;
use App\Http\Controllers\Auth\PatientController;

use App\Http\Controllers\Auth\DoctorController;
use App\Http\Controllers\Auth\PharmacyEmployee;
use App\Http\Controllers\Auth\RayEmployeeController;


use App\Http\Controllers\Auth\PharmacyEmployeeController;
use Illuminate\Support\Facades\Route;

// User Registration and Login Routes (for guests only)
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // User login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.user');

    // Admin Login (protected by guest:admin)
    Route::middleware('guest:admin')->group(function () {
        Route::get('Admin/login', [AdminController::class, 'create'])->name('login.admin');
        Route::post('Admin/login', [AdminController::class, 'store'])->name('login.admin');
    });
});

// Admin Logout (protected by auth:admin)
Route::post('logout/admin', [AdminController::class, 'destroy'])->middleware('auth:admin')->name('logout.admin');

Route::post('/login/doctor', [DoctorController::class, 'store'])->middleware('guest')->name('login.doctor');

Route::post('/logout/doctor', [DoctorController::class, 'destroy'])->middleware('auth:doctor')->name('logout.doctor');
Route::post('/login/ray_employee', [RayEmployeeController::class, 'store'])->middleware('guest')->name('login.ray_employee');
Route::post('/login/patient', [PatientController::class, 'store'])->middleware('guest')->name('login.patient');
Route::post('/login/pharmacy_employee', [PharmacyEmployeeController::class, 'store'])->middleware('guest')->name('login.pharmacy_employee');
Route::post('/logout/pharmacy_employee', [PharmacyEmployeeController::class, 'destroy'])->middleware('auth:pharmacy_employee')->name('logout.pharmacy_employee');


Route::post('/logout/patient', [PatientController::class, 'destroy'])->middleware('auth:patient')->name('logout.patient');
Route::post('/logout/ray_employee', [RayEmployeeController::class, 'destroy'])->middleware('auth:ray_employee')->name('logout.ray_employee');
Route::post('/login/laboratorie_employee', [LaboratorieEmployeeController::class, 'store'])->middleware('guest')->name('login.laboratorie_employee');

Route::post('/logout/laboratorie_employee', [LaboratorieEmployeeController::class, 'destroy'])->middleware('auth:laboratorie_employee')->name('logout.laboratorie_employee');

// User Password Reset Routes
Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Protected Routes for Logged-in Users
Route::middleware('auth')->group(function () {
    // Email Verification
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    // Confirm Password and Password Update
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // User logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout.user');
});

