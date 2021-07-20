<?php

use App\Models\companies;
use App\Models\employees;
use App\Http\Controllers\companiesController;
use App\Http\Controllers\employeesController;
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

Route::get('/management', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/companies', function(){
    $companies = companies::all();
    return view('dashboard', ['companies' => $companies]);
});

Route::get('/', [companiesController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('companies/{companies:id}/Name', [companiesController::class, 'show']);

Route::get('companies/{companies:id}/employees', [employeesController::class, 'show']);
Route::get('delete/{id}', [employeesController::class, 'delete']);