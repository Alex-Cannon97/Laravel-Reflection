<?php

use App\Models\companies;
use App\Models\employees;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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
    $companies = companies::all();
    return view('dashboard', ['companies' => $companies]);
    });

    Route::get('/', [CompanyController::class, 'index'])->name('dashboard');

    Route::get('companies/{companies:id}/Details', [CompanyController::class, 'show']);

    Route::get('companies/{companies:id}/employees', [EmployeeController::class, 'index']);
    Route::get('deletes/{id}', [EmployeeController::class, 'destroy']);

    Route::get('delete/{id}', [CompanyController::class, 'destroy']);
    Route::post('companies/{companies:id}/store', [EmployeeController::class, 'store']);
    Route::post('companies/store', [CompanyController::class, 'Store']);
    Route::post('companies/{companies:id}/update', [CompanyController::class, 'update']);
    Route::get('employees/{employee}', [EmployeeController::class, 'show']);
    Route::patch('employees/{employee:id}/update', [EmployeeController::class, 'update']);
});

