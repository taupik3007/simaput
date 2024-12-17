<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{
    protected $primaryKey = 'sta_id';
    protected $guarded = [];

    const CREATED_AT = 'sta_created_at';
    const UPDATED_AT = 'sta_updated_at';
    const DELETED_AT = 'sta_deleted_at';
}
