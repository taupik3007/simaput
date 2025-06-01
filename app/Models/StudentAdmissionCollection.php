<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAdmissionCollection extends Model
{
    protected $table = 'student_admission_collections';
    protected $primaryKey = 'sar_id';
    protected $guarded = [];

    const CREATED_AT = 'sta_created_at';
    const UPDATED_AT = 'sar_updated_at';
    const DELETED_AT = 'sar_deleted_at';
   
}
