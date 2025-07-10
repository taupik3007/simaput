<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignmentSubmission extends Model
{
    use SoftDeletes;

    protected $table = 'assignment_submissions';
    protected $primaryKey = 'asb_id';
    protected $guarded = [];

    const CREATED_AT = 'asb_created_at';
    const UPDATED_AT = 'asb_updated_at';
    const DELETED_AT = 'asb_deleted_at';

    // Relasi ke Assignment
    public function assignment()
    {
        return $this->belongsTo(Assignment::class, 'asb_assignment_id', 'asg_id');
    }

    // Relasi ke User (siswa)
    public function student()
    {
        return $this->belongsTo(User::class, 'asb_student_id', 'usr_id');
    }
}
