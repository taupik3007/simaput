<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $primaryKey = 'smt_id';
    protected $guarded = [];

    const CREATED_AT = 'smt_created_at';
    const UPDATED_AT = 'smt_updated_at';

    // Relasi ke academic_year
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'smt_academic_year_id', 'acy_id');
    }

    // Relasi ke report cards
    public function reportCards()
    {
        return $this->hasMany(ReportCard::class, 'rpc_semester_id', 'smt_id');
    }
}
