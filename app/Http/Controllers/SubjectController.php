<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Major;
use App\Models\User;

use App\Models\TeachingAssignment;

Use Alert;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Mata Pelajaran!';
        $text = "mata Pelajaran Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
        $subject = Subject::all();
        return view('staff.subject.index',compact(['subject']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $major = Major::all();
        return view('staff.subject.create',compact(['major']));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->subj_major_id == 0){
            $subjectCount = Subject::where('subj_major_id',null)->where('subj_level',$request->subj_level)->withTrashed()->count();
            // dd($subjectCount);
            $major_id = null;
            $subj_code = "Norm.".$request->subj_level.".".$subjectCount+1;
        }else{
            $major = Major::where('mjr_id',$request->subj_major_id)->first();
            $subjectCount = Subject::where('subj_major_id',$request->subj_major_id)->where('subj_major_id',$request->subj_major_id)->withTrashed()->where('subj_level',$request->subj_level)->count();
            $major_id=$request->subj_major_id;
            $subj_code = $major->mjr_prefix.".".$request->subj_level.".".$subjectCount+1;
        }
        $createSubject = Subject::create([
            'subj_name'=> $request->subj_name,
            'subj_level'=>$request->subj_level,
            'subj_major_id'=> $major_id,
            'subj_code'=>$subj_code
        ]);
        Alert::success('Berhasil Menambah', 'Mata Pelajaran Berhasil Ditambah');
            return redirect('/staff/subject');
    }



    //classes
  
    public function classes( $subj_id)
    {
        $teachingAssignment = TeachingAssignment::where('teach_subject_id',$subj_id)->get();
        // dd($teachingAssignment);
       
        return view('staff.subject.classes',compact(['teachingAssignment','subj_id']));
    }

     public function classesCreate( $subj_id)
    {
        // $teachingAssignment = TeachingAssignment::where('teach_subject_id',$subj_id)->get();
        // // dd($teachingAssignment);
        $teacher = User::role('teacher')->get();
        $subject = Subject::find($subj_id);
        $query = Classes::where('cls_level', $subject->subj_level);
        if (!is_null($subject->subj_major_id)) {
            $query->where('cls_major_id', $subject->subj_major_id);
        } else {
        //  $query->whereNull('cls_major_id');
        }
        $taughtClassIds = TeachingAssignment::where('teach_subject_id', $subject->subj_id)
    ->pluck('teach_class_id');
    $query->whereNotIn('cls_id', $taughtClassIds);
    $classes = $query->with('cls_major')->get();
    // dd($availableClasses);
        // dd($query);
    // dd($availableClasses);
       
        return view('staff.subject.classes-create',compact(['teacher','classes']));
    }
    public function classesStore( $subj_id, request $request)
    {
        // dd($request);
        foreach ($request->teach_class_id as $key => $teach_class_id) {
// dd($teach_class_id);
            $teachingAssignment = TeachingAssignment::create([
            'teach_teacher_id' => $request->teach_teacher_id,
            'teach_subject_id'  => $subj_id,
            'teach_class_id'    =>$teach_class_id

            ]);
        }
         Alert::success('Berhasil menampah', 'Pengampu Berhasil Ditambah');
            return redirect('/staff/subject');
    }
    
}
