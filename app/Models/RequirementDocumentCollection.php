<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequirementDocumentCollection extends Model
{
    use  SoftDeletes ;
    protected $primaryKey = 'rdc_id';
    protected $guarded = [];

    const CREATED_AT = 'rdc_created_at';
    const UPDATED_AT = 'rdc_updated_at';
    const DELETED_AT = 'rdc_deleted_at';
}
