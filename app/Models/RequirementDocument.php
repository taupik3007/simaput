<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequirementDocument extends Model
{
    use  SoftDeletes ;
    protected $primaryKey = 'rqd_id';
    protected $guarded = [];

    const CREATED_AT = 'rqd_created_at';
    const UPDATED_AT = 'rqd_updated_at';
    const DELETED_AT = 'rqd_deleted_at';
}
