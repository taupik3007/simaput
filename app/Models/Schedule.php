<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;

    protected $table = 'schedules';
    protected $primaryKey = 'sch_id';

    protected $fillable = [
        'sch_class_id',
        'sch_slot_id',
        'sch_teaching_id',
        'sch_created_by',
        'sch_updated_by',
        'sch_deleted_by',
        'sch_sys_note',
    ];
    const CREATED_AT = 'sch_created_at';
    const UPDATED_AT = 'sch_updated_at';
    const DELETED_AT = 'sch_deleted_at';

    protected $dates = ['sch_deleted_at'];

    // 🔁 Relasi ke kelas
    public function class()
    {
        return $this->belongsTo(Classes::class, 'sch_class_id', 'cls_id');
    }

    // 🔁 Relasi ke teaching assignment (mapel & guru)
    public function teachingAssignment()
    {
        return $this->belongsTo(TeachingAssignment::class, 'sch_teaching_id', 'teach_id');
    }

    // 🔁 Relasi ke slot jadwal
    public function slot()
    {
        return $this->belongsTo(ScheduleSlot::class, 'sch_slot_id', 'schs_id');
    }

    // 🔁 Relasi ke user yang buat
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'sch_created_by', 'usr_id');
    }

    // 🔁 Relasi ke user yang update
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'sch_updated_by', 'usr_id');
    }

    // 🔁 Relasi ke user yang hapus
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'sch_deleted_by', 'usr_id');
    }
}
