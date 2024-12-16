<?php


use App\Events\MyEvent;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\Dashboard\LaboratorieEmployeeController;
use App\Http\Controllers\RoomAssignmentController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Dashboard\appointments\AppointmentController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PharmacyEmployeeController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\RayEmployeeController;






Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });

        Route::get('/dashboard/user', function () {


            return view('Dashboard.User.dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard.user');

        Route::get('dashboard/admin', function () {

            return view('Dashboard.Admin.dashboard');
        })->middleware('auth:admin')->name('dashboard.admin');






    Route::middleware(['auth:admin'])->group(function () {


            Route::resource('sections', 'App\Http\Controllers\Dashboard\SectionController');

            Route::resource('doctors', 'App\Http\Controllers\Dashboard\DoctorController');
            Route::post('update_password', [\App\Http\Controllers\Dashboard\DoctorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [\App\Http\Controllers\Dashboard\DoctorController::class, 'update_status'])->name('update_status');


            Route::resource('service', SingleServiceController::class);

            Route::view('Add_GroupServices','livewire.GroupServices.include_create')->name('Add_GroupServices');

            Route::resource('insurance', InsuranceController::class);
            Route::resource('ambulance', AmbulanceController::class);
            Route::resource('Patients', PatientController::class);
            Route::view('single_invoices','livewire.single_invoices.index')->name('single_invoices');
            Route::resource('Receipt', ReceiptAccountController::class);
            Route::resource('Payment', PaymentAccountController::class);
            Route::resource('ray_employee', RayEmployeeController::class);
            Route::resource('laboratorie_employee', LaboratorieEmployeeController::class);
            Route::resource('pharmacy_employee', PharmacyEmployeeController::class);



            Route::view('Print_single_invoices','livewire.single_invoices.print')->name('Print_single_invoices');
            Route::view('group_invoices','livewire.Group_invoices.index')->name('group_invoices');

            Route::view('group_Print_single_invoices','livewire.Group_invoices.print')->name('group_Print_single_invoices');

            Route::get('appointments',[AppointmentController::class,'index'])->name('appointments.index');
            Route::put('appointments/approval/{id}',[AppointmentController::class,'approval'])->name('appointments.approval');
            Route::get('appointments/approval',[AppointmentController::class,'index2'])->name('appointments.index2');
            Route::delete('appointments/destroy/{id}',[AppointmentController::class,'destroy'])->name('appointments.destroy');


            Route::resource('rooms', RoomController::class);
            Route::resource('room-assignments', RoomAssignmentController::class);
            Route::resource('checkin', CheckInController::class);



        });
















        require __DIR__.'/auth.php';


    });





