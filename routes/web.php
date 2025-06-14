<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\RequirementDocumentController;
use App\Http\Controllers\ApplicationRequirementDocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAdmissionController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\ProspectiveStudent\StudentAdmissionCollectionController;
use App\Http\Controllers\ProspectiveStudent\RequirementDocumentCollectionController;
use App\Http\Controllers\StudentAdmissionRegistrationController;


// use App\Http\Controllers\ProspectiveStudent\StudentAdmissionCollectionController;


// use App\Http\Controllers\RegisterController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register-teacher', [RegisterController::class, 'register_teacher_page']);
Route::post('/user/add/teacher', [RegisterController::class, 'register_teacher_system']);


Route::get('/register-student', [RegisterController::class, 'register_student_page']);
Route::post('/user/add/student', [RegisterController::class, 'registerStudentSystem']);

Route::get('/register-staff', [RegisterController::class, 'register_staff_page']);
Route::post('/user/add/staff', [RegisterController::class, 'register_staff_system']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        $redirect = '/staff/dashboard';


        if ($user->hasRole('staff')) {
            $redirect = '/staff/dashboard';
        } elseif ($user->hasRole('teacher')) {
            $redirect = '/teacher/dashboard';
        } elseif ($user->hasRole('student') && $user->usr_status == 0) {
            $redirect = '/prospective-student/home';
        } elseif ($user->hasRole('student')) {
            $redirect = '/student/dashboard';
        } else {
            $redirect = '/dashboard'; // fallback
        }
        return redirect()->intended($redirect);
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

    // Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/staff/dashboard', [DashboardController::class, 'index'])->name('staff.dashboard');
    Route::get('/teacher/dashboard', [DashboardController::class, 'teacher_index'])->name('teacher.dashboard');


    Route::get('/staff/major',[MajorController::class, 'index'])->name('staff.major');
    Route::get('/staff/major/create',[MajorController::class, 'create'])->name('staff.major.create');
    Route::post('/staff/major/create',[MajorController::class, 'store'])->name('staff.major.store');
    Route::get('/staff/major/{id}/edit',[MajorController::class, 'edit'])->name('staff.major.store');
    Route::post('/staff/major/{id}/edit',[MajorController::class, 'update'])->name('staff.major.update');
    Route::delete('/staff/major/{id}/destroy',[MajorController::class, 'destroy'])->name('staff.major.destroy');

    Route::get('/staff/academic-year', [AcademicYearController::class, 'index'])->name('staff.academicyear');
    Route::get('/staff/academic-year/create', [AcademicYearController::class, 'create'])->name('staff.academicyear.create');
    Route::post('/staff/academic-year/create', [AcademicYearController::class, 'store'])->name('staff.academicyear.store');
    Route::get('/staff/academic-year/{id}/edit', [AcademicYearController::class, 'edit'])->name('staff.academicyear.store');
    Route::post('/staff/academic-year/{id}/edit', [AcademicYearController::class, 'update'])->name('staff.academicyear.update');
    Route::delete('/staff/academic-year/{id}/destroy', [AcademicYearController::class, 'destroy'])->name('staff.academicyear.destroy');

    Route::get('/staff/classes', [ClassesController::class, 'index'])->name('staff.classes');
    Route::get('/staff/classes/create', [ClassesController::class, 'create'])->name('staff.classes.create');
    Route::post('/staff/classes/create', [ClassesController::class, 'store'])->name('staff.classes.store');
    Route::get('/staff/classes/{id}/edit', [ClassesController::class, 'edit'])->name('staff.classes.edit');
    Route::post('/staff/classes/{id}/edit', [ClassesController::class, 'update'])->name('staff.classes.update');
    Route::delete('/staff/classes/{id}/destroy', [ClassesController::class, 'destroy'])->name('staff.classes.destroy');
    Route::get('/staff/classes/{id}/homeroom/edit', [ClassesController::class, 'homeroomEdit'])->name('staff.classes.homeroom.edit');
    Route::post('/staff/classes/{id}/homeroom/edit', [ClassesController::class, 'homeroomUpdate'])->name('staff.classes.homeroom.update');
    Route::get('/staff/classes/{id}/student', [ClassesController::class, 'student'])->name('staff.classes.student');

    Route::get('/staff/ppdb-requirement-document', [RequirementDocumentController::class, 'index'])->name('staff.ppdbrequirementdocument');
    Route::get('/staff/ppdb-requirement-document/create', [RequirementDocumentController::class, 'create'])->name('staff.ppdbrequirementdocument.create');
    Route::post('/staff/ppdb-requirement-document/create', [RequirementDocumentController::class, 'store'])->name('staff.ppdbrequirementdocument.store');
    Route::get('/staff/ppdb-requirement-document/{id}/edit', [RequirementDocumentController::class, 'edit'])->name('staff.ppdbrequirementdocument.edit');
    Route::post('/staff/ppdb-requirement-document/{id}/edit', [RequirementDocumentController::class, 'update'])->name('staff.ppdbrequirementdocument.update');
    Route::delete('/staff/ppdb-requirement-document/{id}/destroy', [RequirementDocumentController::class, 'destroy'])->name('staff.ppdbrequirementdocument.destroy');

    Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile');


    Route::get('/staff/application-requirement-document', [ApplicationRequirementDocumentController::class, 'index'])->name('staff.ppdbrequirementdocument');
    Route::get('/staff/application-requirement-document/create', [ApplicationRequirementDocumentController::class, 'create'])->name('staff.ppdbrequirementdocument.create');
    Route::post('/staff/application-requirement-document/create', [ApplicationRequirementDocumentController::class, 'store'])->name('staff.ppdbrequirementdocument.store');
    Route::get('/staff/application-requirement-document/{id}/edit', [ApplicationRequirementDocumentController::class, 'edit'])->name('staff.ppdbrequirementdocument.edit');
    Route::post('/staff/application-requirement-document/{id}/edit', [ApplicationRequirementDocumentController::class, 'update'])->name('staff.ppdbrequirementdocument.update');
    Route::delete('/staff/application-requirement-document/{id}/destroy', [ApplicationRequirementDocumentController::class, 'destroy'])->name('staff.ppdbrequirementdocument.destroy');

    Route::get('/staff/student-admission', [StudentAdmissionController::class, 'index'])->name('staff.studentadmission');
    Route::get('/staff/student-admission/create', [StudentAdmissionController::class, 'create'])->name('staff.studentadmission.create');
    Route::post('/staff/student-admission/create', [StudentAdmissionController::class, 'store'])->name('staff.studentadmission.store');
    Route::get('/staff/student-admission/{id}/edit', [StudentAdmissionController::class, 'edit'])->name('staff.studentadmission.edit');
    Route::post('/staff/student-admission/{id}/edit', [StudentAdmissionController::class, 'update'])->name('staff.studentadmission.update');
    Route::delete('/staff/student-admission/{id}/destroy', [StudentAdmissionController::class, 'destroy'])->name('staff.studentadmission.destroy');

    Route::get('/staff/student-admission-collection/not-submitted', [StudentAdmissionRegistrationController::class, 'notSubmitted'])->name('staff.studentadmission.not-submitted');
    Route::get('/staff/student-admission-collection/{admission_id}/submission', [StudentAdmissionRegistrationController::class, 'submission'])->name('staff.studentadmission.submission');
    Route::get('/staff/student-admission-collection/{admission_id}/accepted', [StudentAdmissionRegistrationController::class, 'accepted'])->name('staff.studentadmission.accepted');
    Route::get('/staff/student-admission-collection/{admission_id}/rejected', [StudentAdmissionRegistrationController::class, 'rejected'])->name('staff.studentadmission.rejected');

});




Route::group(['middleware' => 'auth'], function () {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
});



Route::group(['middleware' => 'auth'], function () {
    //prospective student
    Route::get('/prospective-student/home', [StudentAdmissionCollectionController::class, 'home'])->name('ProspectiveStudent.home');
    Route::get('/prospective-student/biodata', [StudentAdmissionCollectionController::class, 'biodata'])->name('ProspectiveStudent.biodata');
    Route::post('/prospective-student/biodata', [StudentAdmissionCollectionController::class, 'biodataUpdate'])->name('ProspectiveStudent.biodata.update');
    Route::get('/prospective-student/parent', [StudentAdmissionCollectionController::class, 'parent'])->name('ProspectiveStudent.parent');
    Route::post('/prospective-student/parent', [StudentAdmissionCollectionController::class, 'parentUpdate'])->name('ProspectiveStudent.parent.update');
    Route::get('/prospective-student/address', [StudentAdmissionCollectionController::class, 'address'])->name('ProspectiveStudent.address');
    Route::post('/prospective-student/address', [StudentAdmissionCollectionController::class, 'addressUpdate'])->name('ProspectiveStudent.address.update');
    Route::get('/prospective-student/origin-school', [StudentAdmissionCollectionController::class, 'originSchool'])->name('ProspectiveStudent.originSchool');
    Route::post('/prospective-student/origin-school', [StudentAdmissionCollectionController::class, 'originSchoolUpdate'])->name('ProspectiveStudent.originSchoolUpdate');

    Route::get('/prospective-student/address', [StudentAdmissionCollectionController::class, 'address'])->name('ProspectiveStudent.address');
    Route::get('/prospective-student/address/regencies/{procvince_id}', [StudentAdmissionCollectionController::class, 'regencies']);
    Route::get('/prospective-student/address/districts/{regency_id}', [StudentAdmissionCollectionController::class, 'districts']);
    Route::get('/prospective-student/address/villages/{district_id}', [StudentAdmissionCollectionController::class, 'villages']);

    // Route::get('/prospective-student/address/', [StudentAdmissionCollectionController::class, 'address'])->name('ProspectiveStudent.address');

    Route::post('/prospective-student/address', [StudentAdmissionCollectionController::class, 'addressUpdate'])->name('ProspectiveStudent.address.update');
    Route::get('/prospective-student/requirement-document-collection', [RequirementDocumentCollectionController::class, 'requirementSubmission']);
    Route::post('/prospective-student/requirement-document-collection', [RequirementDocumentCollectionController::class, 'requirementSubmissionStore']);

    Route::get('/prospective-student/student-admission-collection', [StudentAdmissionCollectionController::class, 'admissionCollection']);


});







