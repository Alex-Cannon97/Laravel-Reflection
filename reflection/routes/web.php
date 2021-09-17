<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Models\Company;
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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function(){
   
    Route::get('/companies', function(){
        $companies = Company::all();
        return view('dashboard', ['companies' => $companies]);
    });

    Route::get('/', [CompanyController::class, 'index'])->name('dashboard');

    Route::get('companies/{company}/Details', [CompanyController::class, 'show']);

    Route::get('companies/{company}/employees', [EmployeeController::class, 'index']);
    Route::get('deletes/{employee}', [EmployeeController::class, 'destroy']);

    Route::get('delete/{company}', [CompanyController::class, 'destroy']);
    Route::post('companies/{company}/store', [EmployeeController::class, 'store']);
    Route::post('companies/store', [CompanyController::class, 'store']);
    Route::post('companies/{company}/update', [CompanyController::class, 'update']);
    Route::get('employees/{employee}', [EmployeeController::class, 'show']);
    Route::patch('employees/{employee}/update', [EmployeeController::class, 'update']);
});

