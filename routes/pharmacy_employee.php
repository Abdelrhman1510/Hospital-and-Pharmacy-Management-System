<?php


use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_Doctor\LaboratorieController;
use App\Http\Controllers\Dashboard_Doctor\pharamacyController;
use App\Http\Controllers\Dashboard_Doctor\PatientDetailsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Http\Controllers\Dashboard_Pharmacy_Employee\MedicineSectionController;
use App\Http\Controllers\Dashboard_Pharmacy_Employee\MedicineController;
use App\Http\Controllers\Dashboard_Pharmacy_Employee\InvoiceController;

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


    //################################ dashboard doctor ########################################

    Route::get('/dashboard/pharamacy_employee', function () {
        return view('Dashboard.dashboard_pharmacyEmployee.dashboard');
    })->middleware(['auth:pharmacy_employee'])->name('dashboard.pharmacy_employee');
    Route::middleware(['auth:pharmacy_employee'])->group(function () {
        Route::resource('medicine-sections', MedicineSectionController::class);
    Route::resource('medicines', MedicineController::class);
    Route::resource('medicineinvoices', InvoiceController::class);
    Route::get('/medicineinvoices/{id}/raw', [InvoiceController::class, 'raw'])->name('medicineinvoices.raw');


    });



        //############################# end invoices route ######################################

        });
    //################################ end dashboard doctor #####################################

//---------------------------------------------------------------------------------------------------------------


    require __DIR__ . '/auth.php';


