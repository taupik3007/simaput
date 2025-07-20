<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\TeachingAssignment;
use App\Models\LearningModule;
use App\Models\Semester;
class CurriculumController extends Controller
{
    public function module($id){
         $title = 'Hapus Modul!';
        $text = "Modul Tidak Bisa Kembali Jika Di Hapus";
        confirmDelete($title, $text);
         $module = TeachingAssignment::with(['learningModules' => function ($query) {
        $query->whereNotNull('mod_start_date');
    }])
    ->where('teach_id', $id)
    ->firstOrFail();

    

    return view('staff.curriculum.module', compact('module'));
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
    

    return view('staff.curriculum.administration', compact('module'));
    }

}
