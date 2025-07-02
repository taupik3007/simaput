<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningModule extends Model
{
    use SoftDeletes;

    protected $table = 'learning_modules';
    protected $primaryKey = 'mod_id';

    protected $guarded = [
       
    ];

    protected $dates = [
        'mod_created_at',
        'mod_updated_at',
        'mod_deleted_at',
        'mod_start_date',
    ];

    public $timestamps = true;

    const CREATED_AT = 'mod_created_at';
    const UPDATED_AT = 'mod_updated_at';
    const DELETED_AT = 'mod_deleted_at';

    // Relasi ke TeachingAssignment
    public function teachingAssignment()
    {
        return $this->belongsTo(TeachingAssignment::class, 'mod_teaching_id', 'teach_id');
    }

    // Relasi ke User (pembuat)
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'mod_created_by', 'usr_id');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'mod_updated_by', 'usr_id');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'mod_deleted_by', 'usr_id');
    }
}
