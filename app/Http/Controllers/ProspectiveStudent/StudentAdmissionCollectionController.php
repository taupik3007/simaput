<?php

namespace App\Http\Controllers\ProspectiveStudent;

use App\Http\Controllers\Controller;
use App\Models\StudentAdmissionCollection;
use Illuminate\Http\Request;

class StudentAdmissionCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('prospective_student.ppdb.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function biodata(){
        return view('prospective_student.ppdb.biodata');
   }
   public function biodataUpdate(){
        
   }
    public function parent(){
        return view('prospective_student.ppdb.parent');
   }
   public function parentUpdate(){
        
   }
    public function address(){
        return view('prospective_student.ppdb.address');
   }
   public function addressUpdate(){
        
   }
    public function originSchool(){
        return view('prospective_student.ppdb.originSchool');
   }
   public function originSchoolUpdate(){
        
   }
}
