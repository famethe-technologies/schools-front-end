<?php

use App\Http\Controllers\FeesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\ReportsController;
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
Route::get('/view/schools', [App\Http\Controllers\InstitutionController::class, 'index'])->name('schools.index');
Route::get('/add/school', [App\Http\Controllers\InstitutionController::class, 'create'])->name('school.add');
Route::post('/school/add', [App\Http\Controllers\InstitutionController::class, 'store'])->name('school.store');
Route::get('/school/{id}', [App\Http\Controllers\InstitutionController::class, 'getSchoolById']);
Route::get('/get/schools', [App\Http\Controllers\InstitutionController::class, 'ajax']);
Route::get('/edit/school/{id}',[App\Http\Controllers\InstitutionController::class, 'edit'])->name('schools.edit');
Route::post('/update/school/{id}',[App\Http\Controllers\InstitutionController::class, 'update'])->name('schools.update');


/********************** Staff ********************************************/
Route::get('/create/staff', [App\Http\Controllers\StaffController::class, 'create'])->name('staff.create');;
Route::get('/view/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
Route::post('/add/staff', [App\Http\Controllers\StaffController::class, 'store']);
Route::get('/edit/staff/{id}',[App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');
Route::post('/update/staff/{id}',[App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');
Route::get('/staff/',[App\Http\Controllers\StaffController::class, 'viewStaff'])->name('staff.getAll');
Route::any('/staff-check/',[App\Http\Controllers\StaffController::class, 'checkIfStaffExists'])->name('checkIfStaffExists');

Route::get('/create/class', [App\Http\Controllers\ClassController::class, 'create'])->name('classes');;
Route::get('/view/classes', [App\Http\Controllers\ClassController::class, 'index'])->name('classes.index');
Route::post('/add/class', [App\Http\Controllers\ClassController::class, 'store']);
Route::get('/edit/class/{id}',[App\Http\Controllers\ClassController::class, 'edit'])->name('classes.edit');
Route::post('/update/class/{id}',[App\Http\Controllers\ClassController::class, 'update'])->name('classes.update');
Route::get('/view-by-class/{id}',[App\Http\Controllers\ClassController::class, 'viewByClass']);
Route::get('/class-change-status/{id}',[App\Http\Controllers\ClassController::class, 'destroy']);
Route::get('/class-view-all',[App\Http\Controllers\ClassController::class, 'viewAllClass'])->name('viewAllClass');

Route::get('/create/sport-house', [App\Http\Controllers\SportsController::class, 'create'])->name('houses');;
Route::get('/view/sport-houses', [App\Http\Controllers\SportsController::class, 'index'])->name('houses.index');
Route::post('/add/sport-house', [App\Http\Controllers\SportsController::class, 'store']);
Route::get('/edit/sport-house/{id}',[App\Http\Controllers\SportsController::class, 'edit'])->name('houses.edit');
Route::post('/update/sport-house/{id}',[App\Http\Controllers\SportsController::class, 'update'])->name('houses.update');

Route::get('/create/student', [App\Http\Controllers\StudentController::class, 'create'])->name('students');
Route::get('/view/students', [App\Http\Controllers\StudentController::class, 'index'])->name('students.view');
Route::get('/edit/student/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('students.edit');
Route::post('/update/student/{id}', [App\Http\Controllers\StudentController::class, 'update'])->name('students.update');
Route::get('/view-balance/{id}', [App\Http\Controllers\StudentController::class, 'viewBalance']);
Route::get('/view-school-balance/{id}', [App\Http\Controllers\StudentController::class, 'viewSchoolBalance']);
Route::post('/add/student', [App\Http\Controllers\StudentController::class, 'store']);
Route::get('/single-invoice-view/{id}', [App\Http\Controllers\StudentController::class, 'singleInvoiceView']);
Route::post('/single-invoice-view', [App\Http\Controllers\StudentController::class, 'generateSingleInvoice'])->name('generateSingleInvoice');


//Route::get('/view/students', [App\Http\Controllers\StudentController::class, 'index']);
Route::post('/add/parent', [App\Http\Controllers\ParentController::class, 'store']);

Route::get('view/users',[App\Http\Controllers\UserController::class, 'show']);
Route::get('create/user',[App\Http\Controllers\UserController::class, 'create']);
Route::post('register/user',[App\Http\Controllers\UserController::class, 'register']);
Route::post('update/user/{id}',[App\Http\Controllers\UserController::class, 'update']);
Route::get('edit/user/{id}',[App\Http\Controllers\UserController::class, 'update']);
//Route::get('/daily/transaction', [App\Http\Controllers\MerchantController::class, 'dailyTransactions'])->name('transactions.daily');
//
//Route::get('/search/transaction', [App\Http\Controllers\MerchantController::class, 'searchTransactions'])->name('transactions.search');
//
//Route::post('/search/transaction', [App\Http\Controllers\MerchantController::class, 'customTransactions']);


/*******************************************Institutions***************************************/
Route::get('/add/new/institution', [App\Http\Controllers\InstitutionController::class, 'saveInstitutionView'])->name('institutions.createView');
Route::post('/add/institutions', [App\Http\Controllers\InstitutionController::class, 'saveInstitution'])->name('institutions.save');
Route::get('/institutions', [App\Http\Controllers\InstitutionController::class, 'getInstitutions'])->name('institutions.view');
Route::get('/institutions/{id}', [App\Http\Controllers\InstitutionController::class, 'getInstitution'])->name('institutions.edit');
Route::post('/update/institutions', [App\Http\Controllers\InstitutionController::class, 'updateInstitution'])->name('institutions.update');
Route::any('/delete/institutions/{id}', [App\Http\Controllers\InstitutionController::class, 'deleteInstitution'])->name('institutions.destroy');

/***************************Fees*********************/
Route::resource('fees', FeesController::class);
Route::post('/fees/update/{id}', [FeesController::class, 'update'])->name('fees.update');
Route::any('/fees/delete/{id}', [FeesController::class, 'destroy'])->name('fees.destroy');
Route::any('/fees-configs/{id}', [FeesController::class, 'classFees']);
Route::post('/generate-class-invoice', [FeesController::class, 'generateClassInvoice'])->name('generateClassInvoice');

/**********************************Receipt***********************/
Route::resource('receipts', ReceiptController::class);
Route::post('/receipts/update/{id}', [ReceiptController::class, 'update'])->name('receipts.update');
Route::any('/receipts/delete/{id}', [ReceiptController::class, 'destroy'])->name('receipts.destroy');
Route::get('/receipts/school/balance', [ReceiptController::class, 'getSchoolBalancePage'])->name('receipts.schoolBalancePage');
Route::post('/receipts/school-balance/report', [ReceiptController::class, 'getSchoolBalance'])->name('receipts.schoolBalance');
Route::get('/receipts/student/balance', [ReceiptController::class, 'getStudentBalancePage'])->name('receipts.studentBalancePage');
Route::post('/receipts/student-balance/report', [ReceiptController::class, 'getStudentBalance'])->name('receipts.studentBalance');
Route::get('/receipts/print/page', [ReceiptController::class, 'getReceiptPage'])->name('receipts.printPage');
Route::post('/receipts/print/report', [ReceiptController::class, 'printReceipt'])->name('receipts.print');
Route::get('/cpc/print/page', [ReceiptController::class, 'getCPCPage'])->name('receipts.cpcPage');
Route::post('/cpc/print/report', [ReceiptController::class, 'printCPC'])->name('receipts.printCPC');
Route::get('/bulk-receipting', [ReceiptController::class, 'bulkView'])->name('receipts.create-bulk');
Route::post('/bulk-receipting', [ReceiptController::class, 'postBulkReceipts'])->name('receipts.bulk');

/******************************Invoice****************************************/
Route::resource('invoices', InvoiceController::class);
Route::post('/invoices/update/{id}', [InvoiceController::class, 'update'])->name('invoice.update');
Route::any('/invoices/delete/{id}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
Route::get('/class/invoice', [InvoiceController::class, 'getClassInvoicePage'])->name('invoices.classPage');
Route::post('/invoices/class/report', [InvoiceController::class, 'getClassInvoice'])->name('invoices.class');
Route::get('/school/invoice/create', [InvoiceController::class, 'getSchoolInvoicePage'])->name('invoices.schoolPage');
Route::post('/school/invoice/report', [InvoiceController::class, 'getSchoolInvoice'])->name('invoices.school');
Route::get('/term/invoice/create', [InvoiceController::class, 'getTermInvoicePage'])->name('invoices.termPage');
Route::post('/term/invoice/report', [InvoiceController::class, 'getTermInvoice'])->name('invoices.term');


Route::get('/reports-finders', [ReportsController::class, 'reportsFinder'])->name('reports.generator');
Route::post('/reports-finders', [ReportsController::class, 'generateReport'])->name('generateReport');


Route::get('/bulk-fees-type', [ReceiptController::class, 'bulkFeesType'])->name('bulkFeesType');
Route::get('/bulk-fees-type/{id}', [ReceiptController::class, 'bulkFeesTypeEdit'])->name('bulkFeesTypeEdit');
Route::post('/bulk-fees-type', [ReceiptController::class, 'updateBulkFees'])->name('updateBulkFees');
Route::get('/bulk-fee-create-view', [ReceiptController::class, 'createBulkView'])->name('createBulkView');
Route::post('/bulk-fee-create', [ReceiptController::class, 'createBulkFees'])->name('createBulkFees');
Route::get('/view-bulk-cpc', [ReceiptController::class, 'viewBulkCPC'])->name('viewBulkCPC');
Route::post('/view-bulk-cpc', [ReceiptController::class, 'bulkCpcDownload'])->name('bulkCpcDownload');






