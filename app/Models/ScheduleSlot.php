<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScheduleSlot extends Model
{
     use  SoftDeletes ;
    protected $table = 'schedule_slots';

    protected $primaryKey = 'schs_id';
    protected $guarded = [];

    const CREATED_AT = 'schs_created_at';
    const UPDATED_AT = 'schs_updated_at';
    const DELETED_AT = 'schs_deleted_at';
    public function schedule()
{
    return $this->hasOne(\App\Models\Schedule::class, 'sch_slot_id', 'schs_id');
}
public function teachingAssignment()
    {
        return $this->belongsTo(TeachingAssignment::class, 'sch_teaching_id', 'teach_id');
    }
}
