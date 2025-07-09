<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAdmissionRegistration extends Model
{
    protected $table = 'student_admission_registration';
    protected $primaryKey = 'sar_id';
    protected $guarded = [];
    
    const CREATED_AT = 'sar_created_at';
    const UPDATED_AT = 'sar_updated_at';
    const DELETED_AT = 'sar_deleted_at';
   
    public function student_admission()
{
    return $this->belongsTo(StudentAdmissionRegistration::class, 'sar_admission_id', 'sta_id');
}
public function major()
{
    return $this->belongsTo(Major::class, 'sar_major_id', 'mjr_id');
}
public function studentAdmission()
{
    return $this->belongsTo(\App\Models\StudentAdmission::class, 'sar_student_admission_id', 'sta_id');
}


}
