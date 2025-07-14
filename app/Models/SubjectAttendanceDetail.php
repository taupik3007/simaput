<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectAttendanceDetail extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'sadt_id';
    protected $guarded = [];

    const CREATED_AT = 'sadt_created_at';
    const UPDATED_AT = 'sadt_updated_at';
    const DELETED_AT = 'sadt_deleted_at';

    public function attendance()
    {
        return $this->belongsTo(SubjectAttendance::class, 'sadt_attendance_id', 'satd_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'sadt_student_id', 'std_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'sadt_created_by', 'usr_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'sadt_updated_by', 'usr_id');
    }
    public function getStatusTextAttribute()
{
    return match ($this->sadt_status) {
        1 => 'Hadir',
        2 => 'Izin',
        3 => 'Sakit',
        4 => 'Alpa',
        default => 'Tidak diketahui',
    };
}
}
