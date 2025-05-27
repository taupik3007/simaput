<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    // protected $table = 'academic_years';
    protected $guarded = [];
    protected $primaryKey = 'rlg_id';

    const CREATED_AT = 'rlg_created_at';
    const UPDATED_AT = 'rlg_updated_at';
    const DELETED_AT = 'rlg_deleted_at';
}
