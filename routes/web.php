<?php
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\RequirementDocumentController;
use App\Http\Controllers\ApplicationRequirementDocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAdmissionController;
use App\Http\Controllers\AcademicYearController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// Route::get('/master',function(){
//     return view('staff.profile.pembayaran');
// });

// Route::get('/login2', function () {
//     return view('auth.login2');
// });

// Route::get('/register2', function () {
//     return view('profile.layout.master');
// });



Route::group(['middleware' => 'auth'], function () {

Route::get('/staff/major',[MajorController::class, 'index'])->name('staff.major');
Route::get('/staff/major/create',[MajorController::class, 'create'])->name('staff.major.create');
Route::post('/staff/major/create',[MajorController::class, 'store'])->name('staff.major.store');
Route::get('/staff/major/{id}/edit',[MajorController::class, 'edit'])->name('staff.major.store');
Route::post('/staff/major/{id}/edit',[MajorController::class, 'update'])->name('staff.major.update');
Route::delete('/staff/major/{id}/destroy',[MajorController::class, 'destroy'])->name('staff.major.destroy');

Route::get('/staff/academic-year',[AcademicYearController::class, 'index'])->name('staff.AcademicYear');
Route::get('/staff/academic-year/create',[AcademicYearController::class, 'create'])->name('staff.AcademicYear.create');
Route::post('/staff/academic-year/create',[AcademicYearController::class, 'store'])->name('staff.AcademicYear.store');
Route::get('/staff/academic-year/{id}/edit',[AcademicYearController::class, 'edit'])->name('staff.AcademicYear.store');
Route::post('/staff/academic-year/{id}/edit',[AcademicYearController::class, 'update'])->name('staff.AcademicYear.update');
Route::delete('/staff/academic-year/{id}/destroy',[AcademicYearController::class, 'destroy'])->name('staff.AcademicYear.destroy');

Route::get('/staff/classes',[ClassesController::class, 'index'])->name('staff.classes');
Route::get('/staff/classes/create',[ClassesController::class, 'create'])->name('staff.classes.create');
Route::post('/staff/classes/create',[ClassesController::class, 'store'])->name('staff.classes.store');
Route::get('/staff/classes/{id}/edit',[ClassesController::class, 'edit'])->name('staff.classes.edit');
Route::post('/staff/classes/{id}/edit',[ClassesController::class, 'update'])->name('staff.classes.update');
Route::delete('/staff/classes/{id}/destroy',[ClassesController::class, 'destroy'])->name('staff.classes.destroy');
Route::get('/staff/classes/{id}/homeroom/edit',[ClassesController::class, 'homeroomEdit'])->name('staff.classes.homeroom.edit');
Route::post('/staff/classes/{id}/homeroom/edit',[ClassesController::class, 'homeroomUpdate'])->name('staff.classes.homeroom.update');

Route::get('/staff/ppdb-requirement-document',[RequirementDocumentController::class, 'index'])->name('staff.ppdbrequirementdocument');
Route::get('/staff/ppdb-requirement-document/create',[RequirementDocumentController::class, 'create'])->name('staff.ppdbrequirementdocument.create');
Route::post('/staff/ppdb-requirement-document/create',[RequirementDocumentController::class, 'store'])->name('staff.ppdbrequirementdocument.store');
Route::get('/staff/ppdb-requirement-document/{id}/edit',[RequirementDocumentController::class, 'edit'])->name('staff.ppdbrequirementdocument.edit');
Route::post('/staff/ppdb-requirement-document/{id}/edit',[RequirementDocumentController::class, 'update'])->name('staff.ppdbrequirementdocument.update');
Route::delete('/staff/ppdb-requirement-document/{id}/destroy',[RequirementDocumentController::class, 'destroy'])->name('staff.ppdbrequirementdocument.destroy');

Route::get('profile/{id}',[ProfileController::class, 'index'])->name('profile');


Route::get('/staff/application-requirement-document',[ApplicationRequirementDocumentController::class, 'index'])->name('staff.ppdbrequirementdocument');
Route::get('/staff/application-requirement-document/create',[ApplicationRequirementDocumentController::class, 'create'])->name('staff.ppdbrequirementdocument.create');
Route::post('/staff/application-requirement-document/create',[ApplicationRequirementDocumentController::class, 'store'])->name('staff.ppdbrequirementdocument.store');
Route::get('/staff/application-requirement-document/{id}/edit',[ApplicationRequirementDocumentController::class, 'edit'])->name('staff.ppdbrequirementdocument.edit');
Route::post('/staff/application-requirement-document/{id}/edit',[ApplicationRequirementDocumentController::class, 'update'])->name('staff.ppdbrequirementdocument.update');
Route::delete('/staff/application-requirement-document/{id}/destroy',[ApplicationRequirementDocumentController::class, 'destroy'])->name('staff.ppdbrequirementdocument.destroy');

Route::get('/staff/student-admission',[StudentAdmissionController::class, 'index'])->name('staff.ppdbrequirementdocument');
Route::get('/staff/student-admission/create',[StudentAdmissionController::class, 'create'])->name('staff.studentadmission.create');
Route::post('/staff/student-admission/create',[StudentAdmissionController::class, 'store'])->name('staff.studentadmission.store');
Route::get('/staff/student-admission/{id}/edit',[StudentAdmissionController::class, 'edit'])->name('staff.studentadmission.edit');
Route::post('/staff/student-admission/{id}/edit',[StudentAdmissionController::class, 'update'])->name('staff.studentadmission.update');
Route::delete('/staff/student-admission/{id}/destroy',[StudentAdmissionController::class, 'destroy'])->name('staff.studentadmission.destroy');

});