<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class StudentAdmission extends Model
{
    protected $primaryKey = 'sta_id';
    protected $guarded = [];

    const CREATED_AT = 'sta_created_at';
    const UPDATED_AT = 'sta_updated_at';
    const DELETED_AT = 'sta_deleted_at';
    public function sta_year(): BelongsTo
    {
        return $this->BelongsTo(AcademicYear::class,'sta_academicy_id');
    }
    public function student_admission_registration()
{
    return $this->hasMany(Sta::class, 'sar_admission_id', 'sta_id');
}
public function studentAdmissions()
{
    return $this->hasMany(StudentAdmission::class, 'sta_academicy_id', 'acy_id');
}
public function academicYear()
{
    return $this->belongsTo(\App\Models\AcademicYear::class, 'sta_academicy_id', 'acy_id');
}



   
}
