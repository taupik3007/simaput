<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\RequirementDocumentController;
use App\Http\Controllers\ApplicationRequirementDocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAdmissionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PrecenseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StaffController;

use App\Http\Controllers\LearningModuleController;



use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentClassesController;
use App\Http\Controllers\Student\StudentSubjectController;
use App\Http\Controllers\Student\StudentScheduleController;



use App\Http\Controllers\Teacher\TeacherSubjectController;
use App\Http\Controllers\Teacher\TeacherHomeroomController;
use App\Http\Controllers\Teacher\TeacherScheduleController;
use App\Http\Controllers\Teacher\TeacherAssignmentController;






use App\Http\Controllers\ProspectiveStudent\StudentAdmissionCollectionController;
use App\Http\Controllers\ProspectiveStudent\RequirementDocumentCollectionController;
use App\Http\Controllers\StudentAdmissionRegistrationController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;






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


Route::group(['middleware' => ['auth','role:staff'] ], function () {

    Route::get('/staff/dashboard', [DashboardController::class, 'index'])->name('staff.dashboard');


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
    Route::get('/staff/classes/{id}/schedule', [ClassesController::class, 'schedule'])->name('staff.classes.schedule');
    Route::post('/staff/classes/{id}/schedule/{day}/update', [ClassesController::class, 'storePerDay'])->name('staff.classes.schedule.store');

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
    Route::get('/staff/student-admission-collection/{user_id}/submission/accept', [StudentAdmissionRegistrationController::class, 'acceptSubmission'])->name('staff.studentadmission.accept-submission');
    Route::get('/staff/student-admission-collection/{user_id}/submission/reject', [StudentAdmissionRegistrationController::class, 'rejectSubmission'])->name('staff.studentadmission.reject-submission');
    Route::get('/staff/student-admission-collection/{user_id}/submission/detail', [StudentAdmissionRegistrationController::class, 'detailSubmission'])->name('staff.studentadmission.detail-submission');
    
    Route::get('/staff/partition-classroom', [ClassesController::class, 'partitionClassroom'])->name('staff.classes.partition-classroom');
    Route::post('/staff/partition-classroom', [ClassesController::class, 'partitionClassroomStore'])->name('staff.classes.partition-classroom-store');

    Route::get('/staff/subject', [SubjectController::class, 'index'])->name('staff.subject');
    Route::get('/staff/subject/create', [SubjectController::class, 'create'])->name('staff.subject.create');
    Route::post('/staff/subject/create', [SubjectController::class, 'store'])->name('staff.subject.create');
    Route::get('/staff/subject/{subj_id}/classes', [SubjectController::class, 'classes'])->name('staff.subject.classes');
    Route::get('/staff/subject/{subj_id}/classes/create', [SubjectController::class, 'classesCreate'])->name('staff.subject.classes.create');
    Route::post('/staff/subject/{subj_id}/classes/create', [SubjectController::class, 'classesStore'])->name('staff.subject.classes.store');
    Route::post('/staff/subject/{subj_id}/classes/create', [SubjectController::class, 'classesStore'])->name('staff.subject.classes.store');

    Route::get('/staff/student', [StudentController::class, 'index'])->name('staff.student');
    Route::get('/staff/student/{id}/tap-card', [StudentController::class, 'tapCard'])->name('staff.student.tapcard');
    Route::post('/staff/student/{id}/tap-card', [StudentController::class, 'tapCardStore'])->name('staff.student.tapcardstore');


    Route::get('/staff/teacher', [TeacherController::class, 'index'])->name('staff.teacher');
    Route::get('/staff/teacher/create', [TeacherController::class, 'create'])->name('staff.teacher.create');
    Route::post('/staff/teacher/create', [TeacherController::class, 'store'])->name('staff.teacher.store');
    Route::get('/staff/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('staff.teacher.edit');
    Route::post('/staff/teacher/{id}/edit', [TeacherController::class, 'update'])->name('staff.teacher.update');
    Route::get('/staff/teacher/{id}/edit-password', [TeacherController::class, 'editPassword'])->name('staff.teacher.editpassword');
    Route::put('/staff/teacher/{id}/edit-password', [TeacherController::class, 'updatePassword'])->name('staff.teacher.updatepassword');
    Route::get('/staff/teacher/{id}/subject', [TeacherController::class, 'subject'])->name('staff.teacher.subject');

    Route::get('/staff/staff', [StaffController::class, 'index'])->name('staff.staff');
    Route::get('/staff/staff/create', [StaffController::class, 'create'])->name('staff.staff.create');
    Route::post('/staff/staff/create', [StaffController::class, 'store'])->name('staff.staff.store');
     Route::get('/staff/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.staff.edit');
    Route::post('/staff/staff/{id}/edit', [StaffController::class, 'update'])->name('staff.staff.update');
    Route::get('/staff/staff/{id}/edit-password', [StaffController::class, 'editPassword'])->name('staff.staff.editpassword');
    Route::put('/staff/staff/{id}/edit-password', [StaffController::class, 'updatePassword'])->name('staff.staff.updatepassword');

    Route::get('/staff/schedule', [ScheduleController::class, 'index'])->name('staff.schedule');
    



    
});

    Route::get('/precense', [PrecenseController::class, 'index'])->name('precense');
    Route::post('/precense', [PrecenseController::class, 'store'])->name('precense.store');






Route::group(['middleware' => ['auth','role:teacher']], function () {
    Route::get('/teacher/dashboard', [DashboardController::class, 'teacher_index'])->name('teacher.dashboard');
    Route::get('/teacher/subject', [TeacherSubjectController::class, 'index'])->name('teacher.subject');
    Route::get('/teacher/subject/{id}/module', [TeacherSubjectController::class, 'module'])->name('teacher.subject.module');
    Route::get('/teacher/subject/{id}/module/create', [TeacherSubjectController::class, 'createModule'])->name('teacher.subject.createmodule');
    Route::post('/teacher/subject/{id}/module/create', [TeacherSubjectController::class, 'storeModule'])->name('teacher.subject.storemodule');
    Route::get('/teacher/module/{id}/edit', [TeacherSubjectController::class, 'editModule'])->name('teacher.subject.editmodule');
    Route::post('/teacher/module/{id}/edit', [TeacherSubjectController::class, 'updateModule'])->name('teacher.subject.updatemodule');
    Route::delete('/teacher/module/{id}/destroy', [TeacherSubjectController::class, 'destroyModule'])->name('teacher.subject.destroymodule');
    Route::get('/teacher/module/{id}/download', [LearningModuleController::class, 'download'])->name('module.download');
    Route::get('/teacher/subject/{id}/administration', [TeacherSubjectController::class, 'administration'])->name('teacher.subject.administration');
    Route::get('/teacher/subject/{id}/administration/create', [TeacherSubjectController::class, 'createAdministration'])->name('teacher.subject.createadministration');
    Route::post('/teacher/subject/{id}/administration/create', [TeacherSubjectController::class, 'storeAdministration'])->name('teacher.subject.storeadministration');
    Route::get('/teacher/administration/{id}/edit', [TeacherSubjectController::class, 'editAdministration'])->name('teacher.subject.editadministration');
    Route::put('/teacher/administration/{id}/edit', [TeacherSubjectController::class, 'updateAdministration'])->name('teacher.subject.updateadministration');
    Route::delete('/teacher/administration/{id}/destroy', [TeacherSubjectController::class, 'destroyAdministration'])->name('teacher.subject.destroyadministration');
    Route::get('/teacher/schedule', [TeacherScheduleController::class, 'index'])->name('teacher.schedule');
    Route::get('/teacher/subject/{id}/assignment', [TeacherAssignmentController::class, 'index'])->name('teacher.subject.assignment');
    Route::get('/teacher/subject/{id}/assignment/create', [TeacherAssignmentController::class, 'create'])->name('teacher.subject.assignment.create');
    Route::post('/teacher/subject/{id}/assignment/create', [TeacherAssignmentController::class, 'store'])->name('teacher.subject.assignment.store');
    Route::get('/teacher/assignment/{filename}/download', [TeacherAssignmentController::class, 'download'])->name('teacher.assignment.download');
    Route::get('/teacher/assignments/{id}/edit', [TeacherAssignmentController::class, 'edit'])
    ->name('teacher.assignments.edit');
// Simpan hasil edit
Route::put('/teacher/assignments/{id}', [TeacherAssignmentController::class, 'update'])
    ->name('teacher.assignments.update');
Route::group(['middleware' => ['permission:homeroom']], function () {

   
    Route::get('/teacher/homeroom', [TeacherHomeroomController::class, 'index'])->name('teacher.homeroom');
    Route::get('/teacher/homeroom/{id}/rapor', [TeacherHomeroomController::class, 'index'])->name('teacher.homeroom');
});

});


Route::group(['middleware' => ['auth','role:student']], function () {
    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');

    Route::get('/student/classes', [StudentClassesController::class, 'index'])->name('student.classes');
    Route::get('/student/subject', [StudentSubjectController::class, 'index'])->name('student.subject');
    Route::get('/student/subject/{id}/module', [StudentSubjectController::class, 'module'])->name('student.subject.module');




    Route::get('/student/schedule', [StudentScheduleController::class, 'index'])->name('student.schedule');
    



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
    Route::post('/prospective-student/student-admission-collection', [StudentAdmissionCollectionController::class, 'admissionCollectionStore']);



});







