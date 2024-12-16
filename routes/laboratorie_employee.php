<?php


use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_Doctor\LaboratorieController;
use App\Http\Controllers\Dashboard_Doctor\RayController;
use App\Http\Controllers\Dashboard_Doctor\PatientDetailsController;
use App\Http\Controllers\Dashboard_Laboratorie_Employee\InvoiceController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {




    Route::get('/dashboard/laboratorie_employee', function () {
        return view('Dashboard.dashboard_LaboratorieEmployee.dashboard');
    })->middleware(['auth:laboratorie_employee'])->name('dashboard.laboratorie_employee');


    Route::middleware(['auth:laboratorie_employee'])->group(function () {

        //############################# invoices route ##########################################
         Route::resource('invoices_laboratorie_employee', InvoiceController::class);
         Route::get('lab/completed_invoices', [InvoiceController::class,'completed_invoices'])->name('completed_invoices');
         Route::get('lab/view_laboratories/{id}', [InvoiceController::class,'view_laboratories'])->name('view_laboratories');
        //############################# end invoices route ######################################

        });

//---------------------------------------------------------------------------------------------------------------


    require __DIR__ . '/auth.php';

});
