<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parented extends Model
{
     use  SoftDeletes ;
    protected $primaryKey = 'prn_id';
    protected $guarded = [];

    const CREATED_AT = 'prn_created_at';
    const UPDATED_AT = 'prn_updated_at';
    const DELETED_AT = 'prn_deleted_at';
}
