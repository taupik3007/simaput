<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;

    protected $table = 'assignments';
    protected $primaryKey = 'asg_id';
    protected $guarded = [];

    const CREATED_AT = 'asg_created_at';
    const UPDATED_AT = 'asg_updated_at';
    const DELETED_AT = 'asg_deleted_at';

    // Relasi ke Teaching Assignment
    public function teaching()
    {
        return $this->belongsTo(TeachingAssignment::class, 'asg_teaching_id', 'teach_id');
    }

    // Relasi ke Submission
    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class, 'asb_assignment_id', 'asg_id');
    }
}
