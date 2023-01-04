<?php

use App\Http\Controllers\FeesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReceiptController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/schools', [App\Http\Controllers\InstitutionController::class, 'index'])->name('schools');
Route::get('/add/school', [App\Http\Controllers\InstitutionController::class, 'create'])->name('school.add');
Route::post('/school/add', [App\Http\Controllers\InstitutionController::class, 'store']);
Route::get('/school/{id}', [App\Http\Controllers\InstitutionController::class, 'getSchoolById']);
Route::get('/get/schools', [App\Http\Controllers\InstitutionController::class, 'ajax']);
Route::get('/edit/school/{id}',[App\Http\Controllers\InstitutionController::class, 'edit'])->name('schools.edit');
Route::post('/update/school/{id}',[App\Http\Controllers\InstitutionController::class, 'update'])->name('schools.update');
//Staff

Route::get('/staff', [App\Http\Controllers\StaffController::class, 'create'])->name('staff');;
Route::get('/view/staff/{id}', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
Route::post('/add/staff', [App\Http\Controllers\StaffController::class, 'store']);
Route::get('/edit/staff/{id}',[App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');
Route::post('/update/staff/{id}',[App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');

Route::get('/create/class', [App\Http\Controllers\ClassController::class, 'create'])->name('classes');;
Route::get('/view/classes/{id}', [App\Http\Controllers\ClassController::class, 'index']);
Route::post('/add/class', [App\Http\Controllers\ClassController::class, 'store']);
Route::get('/edit/class/{id}',[App\Http\Controllers\ClassController::class, 'edit'])->name('classes.edit');
Route::post('/update/class/{id}',[App\Http\Controllers\ClassController::class, 'update'])->name('classes.update');

Route::get('/create/sport-house', [App\Http\Controllers\SportsController::class, 'create'])->name('houses');;
Route::get('/view/sport-houses', [App\Http\Controllers\SportsController::class, 'index']);
Route::post('/add/sport-house', [App\Http\Controllers\SportsController::class, 'store']);
Route::get('/edit/sport-house/{id}',[App\Http\Controllers\SportsController::class, 'edit'])->name('houses.edit');
Route::post('/update/sport-house/{id}',[App\Http\Controllers\SportsController::class, 'update'])->name('houses.update');

Route::get('/create/student', [App\Http\Controllers\StudentController::class, 'create'])->name('students');
Route::get('/view/students', [App\Http\Controllers\StudentController::class, 'index']);
Route::post('/add/student', [App\Http\Controllers\StudentController::class, 'store']);


//Route::get('/view/students', [App\Http\Controllers\StudentController::class, 'index']);
Route::post('/add/parent', [App\Http\Controllers\ParentController::class, 'store']);

Route::get('view/users',[App\Http\Controllers\UserController::class, 'show']);
Route::get('create/user',[App\Http\Controllers\UserController::class, 'create']);
Route::post('register/user',[App\Http\Controllers\UserController::class, 'register']);
Route::post('update/user/{id}',[App\Http\Controllers\UserController::class, 'update']);
//Route::get('/daily/transaction', [App\Http\Controllers\MerchantController::class, 'dailyTransactions'])->name('transactions.daily');
//
//Route::get('/search/transaction', [App\Http\Controllers\MerchantController::class, 'searchTransactions'])->name('transactions.search');
//
//Route::post('/search/transaction', [App\Http\Controllers\MerchantController::class, 'customTransactions']);


/*******************************************Institutions***************************************/
Route::get('/add/institutions-view', [App\Http\Controllers\InstitutionController::class, 'saveInstitutionView'])->name('institutions.createView');
Route::post('/add/institutions', [App\Http\Controllers\InstitutionController::class, 'saveInstitution'])->name('institutions.save');
Route::get('/institutions', [App\Http\Controllers\InstitutionController::class, 'getInstitutions'])->name('institutions.view');
Route::get('/institutions/{id}', [App\Http\Controllers\InstitutionController::class, 'getInstitution'])->name('institutions.edit');
Route::post('/update/institutions', [App\Http\Controllers\InstitutionController::class, 'updateInstitution'])->name('institutions.update');
Route::any('/delete/institutions/{id}', [App\Http\Controllers\InstitutionController::class, 'deleteInstitution'])->name('institutions.destroy');



/***************************Fees*********************/
Route::resource('fees', FeesController::class);
Route::post('/fees/update/{id}', [FeesController::class, 'update'])->name('fees.update');
Route::any('/fees/delete/{id}', [FeesController::class, 'destroy'])->name('fees.destroy');

/**********************************Receipt***********************/
Route::resource('receipts', ReceiptController::class);
Route::post('/receipts/update/{id}', [ReceiptController::class, 'update'])->name('receipts.update');
Route::any('/receipts/delete/{id}', [ReceiptController::class, 'destroy'])->name('receipts.destroy');

/******************************Invoice****************************************/
Route::resource('invoices', InvoiceController::class);
Route::post('/invoices/update/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::any('/invoices/delete/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');




