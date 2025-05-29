<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class OriginSchool extends Model
{
     use  SoftDeletes ;
     protected $table = 'origin_schools';
    protected $primaryKey = 'ors_id';
    protected $guarded = [];

    const CREATED_AT = 'ors_created_at';
    const UPDATED_AT = 'ors_updated_at';
    const DELETED_AT = 'ors_deleted_at';
}
