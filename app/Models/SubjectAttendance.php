<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectAttendance extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'satd_id';
    protected $guarded = [];

    const CREATED_AT = 'satd_created_at';
    const UPDATED_AT = 'satd_updated_at';
    const DELETED_AT = 'satd_deleted_at';

    public function teachingAssignment()
    {
        return $this->belongsTo(TeachingAssignment::class, 'satd_teaching_id', 'teach_id');
    }

    public function details()
    {
        return $this->hasMany(SubjectAttendanceDetail::class, 'sadt_attendance_id', 'satd_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'satd_created_by', 'usr_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'satd_updated_by', 'usr_id');
    }
}
