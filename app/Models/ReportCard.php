<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportCard extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'rpc_id';
    protected $guarded = [];

    const CREATED_AT = 'rpc_created_at';
    const UPDATED_AT = 'rpc_updated_at';
    const DELETED_AT = 'rpc_deleted_at';

    // Relasi ke siswa
    public function student()
    {
        return $this->belongsTo(Student::class, 'rpc_student_id', 'std_id');
    }

    // Relasi ke semester
    public function semester()
    {
        return $this->belongsTo(AcademicYear::class, 'rpc_semester_id', 'acy_id');
    }
public function semesters()
{
    return $this->belongsTo(Semester::class, 'rpc_semester_id');
}
    // Relasi ke detail rapor
    public function details()
    {
        return $this->hasMany(ReportCardDetail::class, 'rcd_report_card_id', 'rpc_id');
    }
}
