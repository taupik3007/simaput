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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



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

       $majors = Major::withCount(['registrations' => function ($query) {
        $query->where('sar_status', 2);
        }])->get();
        return view('staff.classes.partition_classroom',compact(['majors']));
    }
     public function partitionClassroomStore(request $request){
        
       $request->validate([
    'classes' => 'required|array',
    'classes.*' => 'required|integer|min:1',
        ]);try {
          DB::beginTransaction();

        // 1. Ambil tahun akademik & pendaftaran aktif
        $academicYear = AcademicYear::where('acy_status', 2)->firstOrFail();
        $studentAdmission = StudentAdmission::where('sta_academicy_id', $academicYear->acy_id)->firstOrFail();

        // 2. Buat semua kelas berdasarkan jurusan
        $kelasByMajor = [];
        foreach ($request->classes as $majorId => $classCount) {
            $kelasByMajor[$majorId] = [];

            for ($i = 0; $i < $classCount; $i++) {
                $kelas = Classes::create([
                    'cls_level' => 'X',
                    'cls_major_id' => $majorId,
                    'cls_academicy_id' => $academicYear->acy_id,
                    'cls_number' => $i + 1,
                    'cls_created_by' => Auth::user()->id,
                ]);

                $kelasByMajor[$majorId][] = [
                    'class' => $kelas,
                    'students' => []
                ];
            }
        }
        // $a=1;
        // dd($a);
        // 3. Ambil semua siswa urut nama global (pakai kolom 'name')
        $allStudents = User::join('student_admission_registration as sar', 'sar.sar_user_id', '=', 'users.usr_id')
            ->where('sar.sar_student_admission_id', $studentAdmission->sta_id)
            ->select('users.usr_id as usr_id', 'users.name', 'sar.sar_major_id')
            ->orderBy('users.name') // ✅ penting: urut nama global
            ->get();
            // dd($allStudents);

        $globalIndex = 1;
        $classPointer = [];

        // Hitung siswa per jurusan
        $studentsPerMajor = $allStudents->groupBy('sar_major_id')->map->count();

        // 4. Loop semua siswa urut nama
        foreach ($allStudents as $student) {
            $majorId = $student->sar_major_id;
            $classPointer[$majorId] ??= 0;

            $kelas = $kelasByMajor[$majorId][$classPointer[$majorId]]['class'];

            $urutan = str_pad($globalIndex++, 2, '0', STR_PAD_LEFT);
            $nis = substr($academicYear->acy_starting_year, -2)
                 . substr($academicYear->acy_year_over, -2)
                 . ".10." . $urutan;

            Student::create([
                'std_user_id'  => $student->usr_id,
                'std_class_id' => $kelas->cls_id,
                'std_nis'      => $nis,
            ]);
            User::where('usr_id', $student->usr_id)->update(['usr_status' => 1]);

            $kelasByMajor[$majorId][$classPointer[$majorId]]['students'][] = $student;

            $maxPerClass = ceil($studentsPerMajor[$majorId] / count($kelasByMajor[$majorId]));
            if (count($kelasByMajor[$majorId][$classPointer[$majorId]]['students']) >= $maxPerClass) {
                $classPointer[$majorId]++;
            }
        }

        DB::commit();

       Alert::success('Berhasil Mengubah Wali kelas', 'Wali Kelas Berhasil Diubah');
        return redirect('/staff/classes');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error saat pembagian kelas: '.$e->getMessage());
       Alert::error('gagal', 'gagal');
        return redirect('/staff/partition-classroom');
    }


    }
}
