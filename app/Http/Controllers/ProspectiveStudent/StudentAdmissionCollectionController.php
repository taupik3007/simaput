<?php

namespace App\Http\Controllers\ProspectiveStudent;

use App\Http\Controllers\Controller;
use App\Models\StudentAdmissionCollection;
use App\Models\Religion;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;



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
        $biodata = Biodata::where('bio_user_id',Auth::user()->usr_id)->first();
        if(isset($biodata)){
       $religion= Religion::where('rlg_id','!=',$biodata->bio_religion_id)->select('rlg_name','rlg_id')->get();

        }else{
       $religion= Religion::select('rlg_name','rlg_id')->get();

        }
        return view('prospective_student.ppdb.biodata',compact(['religion','biodata']));
   }
   public function biodataUpdate(request $request){
        // $request->validate([
        //     'bio_religion_id'      =>  'required',
        //     'bio_place_of_birth'    =>  'required',
        //     'bio_date_of_birth' => 'required',
        //     'bio_height'    => 'required',
        //     'bio_weight'    => 'required'
        // ],[
        //     'required'      => 'harus di isi'
        // ]);
        // $
        // if()
        $biodataCount = Biodata::where('bio_user_id',Auth::user()->usr_id)->count();
        // dd($biodataCount);
        if($biodataCount >= 1){
            $updateBiodata =  Biodata::where('bio_user_id',Auth::user()->usr_id)->first();
        }else{
            $updateBiodata = new Biodata();

        }
        $updateBiodata->bio_user_id = Auth::user()->usr_id;
        $updateBiodata->bio_religion_id = $request->bio_religion_id;
        $updateBiodata->bio_place_of_birth = $request->bio_place_of_birth;
        $updateBiodata->bio_date_of_birth = $request->bio_date_of_birth;
        $updateBiodata->bio_height = $request->bio_height;
        $updateBiodata->bio_weight = $request->bio_weight;
        $updateBiodata->save();
        Alert::success('Berhasil Mengedit Biodata', 'Biodata Berhasil Diedit');
            return redirect('/prospective-student/biodata');
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
        return view('prospective_student.ppdb.origin-school');
   }
   public function originSchoolUpdate(){
        
   }
}
