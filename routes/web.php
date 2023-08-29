<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/employees', [EmployeeController::class,'index'])->name('employee.index');
// Route::get('/employees/create', [EmployeeController::class,'create'])->name('employee.create');
// Route::get('/employees/{id}/edit', [EmployeeController::class,'edit'])->name('employee.edit');
// Route::get('/employees/{id}/', [EmployeeController::class,'show'])->name('employee.show');

// Route::post('/employees/store',[EmployeeController::class,'store'])->name('employee.store');
// Route::put('/employees/update/{id}',[EmployeeController::class,'update'])->name('employee.update');
// Route::delete('/employees/destroy/{employee}',[EmployeeController::class,'destroy'])->name('employee.destroy');

//resource route
Route::resource('employee',EmployeeController::class);
Route::group(['prefix'=>'admin'],function(){
    Route::get('/aboutus', [HomeController::class,'aboutus']) ;
    Route::get('/user/{id}', function ($id) {
        return 'userId id <b>'.$id.'</b>';
    });
});

Route::get('/employee/introduction', function () {
    if(true){
        return '<h1>About employees introduction</h1>';
    }
})->name('article');