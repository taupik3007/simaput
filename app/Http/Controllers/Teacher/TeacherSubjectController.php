<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\TeachingAssignment;
use App\Models\LearningModule;

use Illuminate\Support\Facades\Auth;
class TeacherSubjectController extends Controller
{
    public function index(){
    $subject = TeachingAssignment::where('teach_teacher_id',Auth::user()->usr_id)->get();
    // dd($subject);
    return view('teacher.subject.index',compact(['subject']));
        
    }
    public function module($id){
        $module = TeachingAssignment::with('learningModules')->where('teach_id', $id)->firstOrFail();

    // Cek apakah teaching ini milik guru yang sedang login
    if ($module->teach_teacher_id != auth()->id()) {
        abort(403, 'Kamu tidak punya akses ke modul ini 💔');
    }

    return view('teacher.subject.module', compact('module'));
    }
    public function createModule($id){
        $teaching = TeachingAssignment::where('teach_teacher_id', auth()->id())
        ->first();
        // dd($teaching->teach_id );

    return view('teacher.subject.add_module', compact('teaching'));

        
    }
    public function storeModule($id,request $request){
        $request->validate([
        'mod_teach_id'    => 'required|exists:teaching_assignments,teach_id',
        'mod_title'       => 'required|string|max:255',
        'mod_file'        => 'required|file|mimes:pdf,doc,docx,ppt,pptx',
        'mod_start_date'  => 'required|date',
    ]);

    // Cek kepemilikan teach_id
    $teaching = TeachingAssignment::where('teach_id', $request->mod_teach_id)
        ->where('teach_teacher_id', auth()->id())
        ->firstOrFail();

    $filePath = $request->file('mod_file')->store('modules', 'public');

    LearningModule::create([
        'mod_teaching_id'    => $request->mod_teach_id,
        'mod_name'       => $request->mod_title,
        'mod_file'        => $filePath,
        'mod_start_date'  => $request->mod_start_date,
    ]);
    Alert::success('Berhasil menambah', 'Module telah ditambah');
            return redirect('/teacher/subject/'.$request->mod_teach_id.'/module');
        
    }


}
