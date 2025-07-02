<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeachingAssignment extends Model
{
    use SoftDeletes;

    protected $table = 'teaching_assignments';
    protected $primaryKey = 'teach_id';
    public $timestamps = false;
 const CREATED_AT = 'teach_created_at';
    const UPDATED_AT = 'teach_updated_at';
    const DELETED_AT = 'teach_deleted_at';
    protected $fillable = [
        'teach_teacher_id',
        'teach_subject_id',
        'teach_class_id',
        'teach_created_by',
        'teach_updated_by',
        'teach_deleted_by',
        'teach_sys_note',
        'teach_created_at',
        'teach_updated_at',
        'teach_deleted_at',
    ];

    protected $dates = [
        'teach_created_at',
        'teach_updated_at',
        'teach_deleted_at',
    ];

    // Relasi ke User (guru pengajar)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teach_teacher_id', 'usr_id');
    }

    // Relasi ke Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'teach_subject_id', 'subj_id');
    }

    // Relasi ke Class
    public function class()
    {
        return $this->belongsTo(Classes::class, 'teach_class_id', 'cls_id');
    }

    // Relasi ke Schedule
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'sch_teaching_id', 'teach_id');
    }
    public function learningModules()
{
    return $this->hasMany(LearningModule::class, 'mod_teaching_id', 'teach_id');
}
}