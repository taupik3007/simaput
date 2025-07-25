<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $table = 'academic_years';
    protected $guarded = [];
    protected $primaryKey = 'acy_id';

    const CREATED_AT = 'acy_created_at';
    const UPDATED_AT = 'acy_updated_at';
    const DELETED_AT = 'acy_deleted_at';
    public function acy_admission()
{
    return $this->hasOne(StudentAdmission::class, 'sta_academicy_id', 'acy_id');
}
public function studentAdmissions()
{
    return $this->hasMany(StudentAdmission::class, 'sta_academicy_id', 'acy_id');
}

    
}
