<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subject extends Model
{
    use  SoftDeletes ;
     protected $primaryKey = 'subj_id';
    protected $guarded = [];

    const CREATED_AT = 'subj_created_at';
    const UPDATED_AT = 'subj_updated_at';
    const DELETED_AT = 'subj_deleted_at';
    //
    public function major()
{
    return $this->belongsTo(Major::class, 'subj_major_id', 'mjr_id');
}
public function teachingAssignments()
{
    return $this->hasMany(TeachingAssignment::class, 'teach_subject_id', 'subj_id');
}
}
