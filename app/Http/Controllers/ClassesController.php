<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Models\major;
use App\Models\User;
use App\Models\Student;

Use Alert;
use App\Models\StudentAdmissionRegistration;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAdmission;




class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Kelas!';
        $text = "Kelas Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
        $classes = Classes::all();
        // dd($classes);
        return view('staff.classes.index',compact(['classes'])); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $major = major::select('mjr_name','mjr_id')->get();

        return view('staff.classes.create',compact(['major']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $classCheck = Classes::where('cls_level',$request->cls_level)->where('cls_major_id',$request->cls_major_id)->where('cls_number',$request->cls_number)->first();
        // dd($classCheck);
        if($classCheck){
            Alert::error('Gagal Menambah', 'Kelas Sudah Terdaftar');
            return redirect('/staff/classes');
        }


        $class = Classes::create([
            'cls_academicy_id'=>1,
            'cls_level'     => $request->cls_level,
            'cls_major_id'  => $request->cls_major_id,
            'cls_number'    => $request->cls_number,
            'cls_created_by'=> Auth::user()->usr_id
        ]);

            Alert::success('Berhasil Menambah', 'Kelas Berhasil Ditambah');
            return redirect('/staff/classes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $classes,$id)
    {
        $classes = Classes::findOrFail($id);
        $major = major::select('mjr_name','mjr_id')->where('mjr_id','!=',$classes->cls_major_id)->get();
        return view('staff.classes.edit',compact(['major','classes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes, $id)
    {
        // $major = Major::all();
        $classCheck = Classes::where('cls_level',$request->cls_level)->where('cls_major_id',$request->cls_major_id)->where('cls_number',$request->cls_number)->where('cls_id','!=',$id)->first();
        if($classCheck){
            Alert::error('Gagal Mengubah', 'Kelas Sudah Terdaftar');
            return redirect('/staff/classes');
        }
        $updateClasses = Classes::findOrfail($id);
        $updateClasses->cls_level       = $request->cls_level;
        $updateClasses->cls_major_id    = $request->cls_major_id;
        $updateClasses->cls_number      = $request->cls_number;
        $updateClasses->cls_updated_by  = Auth::user()->usr_id;
        $updateClasses->save();
        Alert::success('Berhasil Mengedit', 'Kelas Berhasil Diedit');
        return redirect('/staff/classes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes,$id)
    {
        $destroyClasses = Classes::findOrFail($id);
        // dd($destroyClasses);
        $majorUpdate = Classes::findOrFail($id)->update([
           
            'cls_deleted_by'=> Auth::user()->usr_id
        ]);
        $destroyClasses->delete();
        Alert::success('Berhasil Menghapus', 'Kelas Berhasil Dihapus');
        return redirect('/staff/classes');
    }

    public function homeroomEdit($id){
        $teacher = User::role('teacher')->get();
        // dd($teacher);
        return view('staff.classes.edit-homeroom',compact(['teacher']));
    }

    public function homeroomUpdate($id, Request $request){
        $classesUpdate = Classes::findOrFail($id)->update([
            'cls_homeroom_id' => $request->cls_homeroom_id
        ]);
        Alert::success('Berhasil Mengubah Wali kelas', 'Wali Kelas Berhasil Diubah');
        return redirect('/staff/classes');
    }

    public function student($id){
        return view('staff.classes.student');
    }

    public function partitionClassroom(){

       $majors = Major::withCount('registrations')->get();
        return view('staff.classes.partition_classroom',compact(['majors']));
    }
     public function partitionClassroomStore(request $request){
        
       $request->validate([
    'classes' => 'required|array',
    'classes.*' => 'required|integer|min:1',
        ]);
        $academicYear = AcademicYear::where('acy_status',2)->first();
        $studentAdmission = StudentAdmission::where('sta_academicy_id',$academicYear->acy_id)->first();
        // dd($studentAdmission);

        foreach ($request->classes as $majorId => $classes) {
            // dd($classes);
            $student = User:: join('student_admission_registration as sar', 'sar.sar_user_id', '=', 'usr_id')->where('sar.sar_student_admission_id',$studentAdmission->sta_id)->get();
            // dd($student);
            $studentChunks = $student->chunk(ceil($student->count() / $classes));
            // dd($studentChunks);s
        foreach (range(1, $classes) as $i => $classNumber) {
            // Misalnya nama kelasnya "X IPA 1", "X IPA 2", dst
            $newClasses = new Classes();
            $newClasses->cls_level = "X";
            $newClasses->cls_major_id = $majorId;
            $newClasses->cls_academicy_id = $academicYear->acy_id;
            $newClasses->cls_number = $i; // atau bisa lebih dinamis kalau kamu punya format
            $newClasses->cls_created_by = Auth::user()->usr_id;
            $newClasses->save();
            foreach($studentChunks[$i] as $student){
                $classesPlace = Student::create([
                    'std_user_id' => $student->usr_id,
                    'std_class_id'=> $newClasses->cls_id,
                ]);
            }
        }
    }


    }
}
