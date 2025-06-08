<?php

namespace App\Http\Controllers\ProspectiveStudent;

use App\Http\Controllers\Controller;
use App\Models\StudentAdmissionRegistration;
use App\Models\Religion;
use App\Models\Parented;
use App\Models\Address;
use App\Models\Biodata;
use App\Models\Major;

use App\Models\OriginSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use App\Models\AcademicYear;



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
        $updateBiodata->bio_user_id         = Auth::user()->usr_id;
        $updateBiodata->bio_gender          = $request->bio_gender;
        $updateBiodata->bio_religion_id     = $request->bio_religion_id;
        $updateBiodata->bio_place_of_birth  = $request->bio_place_of_birth;
        $updateBiodata->bio_date_of_birth   = $request->bio_date_of_birth;
        $updateBiodata->bio_height          = $request->bio_height;
        $updateBiodata->bio_weight          = $request->bio_weight;
        $updateBiodata->save();
        Alert::success('Berhasil Mengedit Biodata', 'Biodata Berhasil Diedit');
            return redirect('/prospective-student/biodata');
   }
    public function parent(){
        $parent =  Parented::where('prn_user_id',Auth::user()->usr_id)->first();

        return view('prospective_student.ppdb.parent',compact(['parent']));
   }
   public function parentUpdate(request $request){
        // dd($request);
        $parentCount    = Parented::where('prn_user_id',Auth::user()->usr_id)->count();
        // dd($parentCheck);
        if($parentCount >= 1){
            $updateParent =  Parented::where('prn_user_id',Auth::user()->usr_id)->first();
        }else{
            $updateParent = new Parented();

        }
        $updateParent->prn_user_id = Auth::user()->usr_id;
        $updateParent->prn_father_name              =  $request->prn_father_name;
        $updateParent->prn_father_occupation        = $request->prn_father_occupation;
        $updateParent->prn_father_phone             = $request->prn_father_phone;
        $updateParent->prn_mother_name              = $request->prn_mother_name;
        $updateParent->prn_mother_occupation        = $request->prn_mother_occupation;
        $updateParent->prn_mother_phone             = $request->prn_mother_phone;
        $updateParent->prn_guardian_name            = $request->prn_guardian_name;
        $updateParent->prn_guardian_occupation      = $request->prn_guardian_occupation;
        $updateParent->prn_guardian_phone           = $request->prn_guardian_phone;
        $updateParent->prn_status                   = $request->prn_status;
        $updateParent->prn_family_income_level      = $request->prn_family_income_level;

        $updateParent->save();
        Alert::success('Berhasil Mengedit Data orang Tua', 'Data Orang Tua Berhasil Diedit');
            return redirect('/prospective-student/parent');
   }
   
    
  
    public function originSchool(){
        $originSchool =  OriginSchool::where('ors_user_id',Auth::user()->usr_id)->first();

        return view('prospective_student.ppdb.origin-school',compact(['originSchool']));
   }
   public function originSchoolUpdate(request $request){
        $originSchoolCount    = OriginSchool::where('ors_user_id',Auth::user()->usr_id)->count();
        if($originSchoolCount >= 1){
            $updateOriginSchool =  OriginSchool::where('ors_user_id',Auth::user()->usr_id)->first();
        }else{
            $updateOriginSchool = new OriginSchool();

        }
        $updateOriginSchool->ors_user_id                  = Auth::user()->usr_id;
        $updateOriginSchool->ors_school_name              =  $request->ors_school_name;
        $updateOriginSchool->ors_npsn                     = $request->ors_npsn;
        $updateOriginSchool->ors_un_participant_number    = $request->ors_un_participant_number;


       

        $updateOriginSchool->save();
        Alert::success('Berhasil Mengedit Asal Sekolah', 'Asal Sekolah Berhasil Diedit');
            return redirect('/prospective-student/origin-school');
   }

   public function address(){
        $address = Address::where('adr_user_id',Auth::user()->usr_id)->first();
        // dd($address);
        $response = Http::get('https://wilayah.id/api/provinces.json');
        $province = $response->json()['data'];
        $selectedProvince = $address->adr_province ?? ''; // kalau belum ada bisa kosongin dulu
        $selectedRegency = $address->adr_regency ?? '';
        $selectedDistrict = $address->adr_district?? '';
        $selectedVillage = $address->adr_village?? '';
        $selectedDetail = $address->adr_detail ?? '';
        // dd($province);
        return view('prospective_student.ppdb.address', compact([
            'province',
            'selectedProvince'   ,
            'selectedRegency'    ,
            'selectedDistrict'  ,
            'selectedVillage'   ,
            'selectedDetail']));
   }
   public function regencies($province_code){
        $response = Http::get('https://wilayah.id/api/regencies/'.$province_code.'.json');
        // dd($response->json());
        return $response->json('data');
   }
   public function districts($district_code){
        $response = Http::get('https://wilayah.id/api/districts/'.$district_code.'.json');
        // dd($response);
        return $response->json('data');
   }
   public function villages($village_code){
        $response = Http::get('https://wilayah.id/api/villages/'.$village_code.'.json');
        // dd($response->json());
        return $response->json('data');
   }
    public function addressUpdate(request $request){
        // dd($request);
        $addresCount = Address::where('adr_user_id',Auth::user()->usr_id)->count();
        if($addresCount >= 1){
            $createAddress = Address::where('adr_user_id',Auth::user()->usr_id)->first()->update([
            'adr_user_id'   => Auth::user()->usr_id,
            'adr_province'  => $request->adr_province,
            'adr_regency'   => $request->adr_regency,
            'adr_district'  => $request->adr_district,
            'adr_village'   => $request->adr_village,
            'adr_detail'    => $request->adr_detail        
        ]);
        }else{
           $createAddress = Address::create([
            'adr_user_id'   => Auth::user()->usr_id,
            'adr_province'  => $request->adr_province,
            'adr_regency'   => $request->adr_regency,
            'adr_district'  => $request->adr_district,
            'adr_village'   => $request->adr_village,
            'adr_detail'    => $request->adr_detail        
        ]); 

        }


        
        Alert::success('Berhasil Mengedit Alamat', 'Alamat Berhasil Diedit');
            return redirect('/prospective-student/address');
   }

   public function admissionCollection(){
     $academicYear = AcademicYear::where('acy_status', 2)->first();

    if (!$academicYear) {
               return view('prospective_student.ppdb.admission-clossed');

    }


    $admission = $academicYear->acy_admission;

    // if (!$admission) {
    //     return view('ppdb.closed', ['message' => 'Data jadwal penerimaan tidak ditemukan']);
    // }

    $today = Carbon::now();

    if ($today->lt($admission->sta_start)) {
        return view('prospective_student.ppdb.admission-clossed');
    }

    if ($today->gt($admission->sta_ended)) {
                        return view('prospective_student.ppdb.admission-clossed');


    }

   $major = Major::all();
   $admissionMajor = StudentAdmissionRegistration::where('sar_user_id',Auth()->user()->usr_id)->first();
    return view('prospective_student.ppdb.admission-collection',compact(['major','admissionMajor']));
   }
   

}
