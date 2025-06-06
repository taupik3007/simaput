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
   
}
