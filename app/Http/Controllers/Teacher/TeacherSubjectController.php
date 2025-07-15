<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Models\TeachingAssignment;
use App\Models\LearningModule;
use App\Models\Semester;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
class TeacherSubjectController extends Controller
{
    public function index(){
    $subject = TeachingAssignment::where('teach_teacher_id',Auth::user()->usr_id)->get();
    $semester = Semester::where('smt_status',1)->where('smt_report_status',1)->first();
    // dd($semester);
    // dd($subject);
    return view('teacher.subject.index',compact(['subject','semester']));
        
    }
    public function module($id){

        $title = 'Hapus Modul!';
        $text = "Modul Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
         $module = TeachingAssignment::with(['learningModules' => function ($query) {
        $query->whereNotNull('mod_start_date');
    }])
    ->where('teach_id', $id)
    ->firstOrFail();

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

public function editModule($id, request $request){
       
        // dd($teaching->teach_id );
        // $module = 1;
        $module = LearningModule::where('mod_id',$id)->first();

    return view('teacher.subject.edit_module', compact('module'));

        
    }
    public function updateModule($id, request $request){
       
        $request->validate([
        'mod_title'       => 'required|string|max:255',
        'mod_start_date'  => 'required|date',
    ]);

    $module = LearningModule::findOrFail($id);
    // dd($module);

    if ($module->teachingAssignment->teach_teacher_id !== Auth::id()) {
        abort(403, 'Anda tidak diizinkan mengedit modul ini.');
    }

    $module->mod_name        = $request->mod_title;
    $module->mod_start_date  = $request->mod_start_date;
    $module->mod_updated_by  = Auth::id();
    $module->save();

     Alert::success('Berhasil menambah', 'Module telah ditambah');
            return redirect('/teacher/subject/'.$module->mod_teaching_id.'/module');

        
    }
    public function destroyModule($id){
    $module = LearningModule::findOrFail($id);
    if ($module->teachingAssignment->teach_teacher_id !== Auth::id()) {
        abort(403, 'Anda tidak diizinkan menghapus modul ini.');
    }
    $module->delete();
      Alert::success('Berhasil menghapus', 'Modul telah dihapus');
            return redirect('/teacher/subject/'.$module->mod_teaching_id.'/module'); 
        
}
public function administration($id){

        $title = 'Hapus Modul!';
        $text = "Modul Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
        $module = TeachingAssignment::with(['learningModules' => function ($query) {
        $query->whereNull('mod_start_date');
    }])
    ->where('teach_id', $id)
    ->firstOrFail();

    // Cek apakah teaching ini milik guru yang sedang login
    if ($module->teach_teacher_id != auth()->id()) {
        abort(403, 'Kamu tidak punya akses ke modul ini 💔');
    }

    return view('teacher.subject.administration', compact('module'));
    }
    public function createAdministration($id){
  $teaching = TeachingAssignment::where('teach_teacher_id', auth()->id())
        ->first();
       

    return view('teacher.subject.add_administration',compact(['teaching']));
    }
public function storeAdministration($id,request $request){
        $request->validate([
        'mod_teach_id'    => 'required|exists:teaching_assignments,teach_id',
        'mod_title'       => 'required|string|max:255',
        'mod_file'        => 'required|file|mimes:pdf,doc,docx,ppt,pptx',
       
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
       
    ]);
    Alert::success('Berhasil menambah', 'Administrasi telah ditambah');
            return redirect('/teacher/subject/'.$request->mod_teach_id.'/administration');
        
    }
    public function editAdministration($id, request $request){
       
        // dd($teaching->teach_id );
        // $module = 1;
        $module = LearningModule::where('mod_id',$id)->first();

    return view('teacher.subject.edit_administration', compact('module'));

        
    }
    public function updateAdministration($id, request $request){
       
       $request->validate([
        'mod_title' => 'required|string|max:255',
        'mod_file'  => 'nullable|file|mimes:pdf,doc,docx|max:5120',
    ]);

    $module = LearningModule::findOrFail($id);
    $module->mod_name = $request->mod_title;

    if ($request->hasFile('mod_file')) {
        // Hapus file lama jika ada
        if ($module->mod_file && Storage::exists($module->mod_file)) {
            Storage::delete($module->mod_file);
        }

        // Simpan file baru
        $filePath = $request->file('mod_file')->store('modules','public');
        $module->mod_file = $filePath;
    }

    $module->save();

    Alert::success('Berhasil mengedit', 'Administrasi telah diedit');
            return redirect('/teacher/subject/'.$module->mod_teaching_id.'/administration');


        
    }
    public function destroyAdministration($id){
    $module = LearningModule::findOrFail($id);
    if ($module->teachingAssignment->teach_teacher_id !== Auth::id()) {
        abort(403, 'Anda tidak diizinkan menghapus modul ini.');
    }
    $module->delete();
      Alert::success('Berhasil menghapus', 'Adminsitrasi telah dihapus');
            return redirect('/teacher/subject/'.$module->mod_teaching_id.'/admnisitration'); 
        
}
}
