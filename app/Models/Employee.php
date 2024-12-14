<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use  SoftDeletes ;
    protected $primaryKey = 'emp_id';
    protected $guarded = [];

    const CREATED_AT = 'emp_created_at';
    const UPDATED_AT = 'emp_updated_at';
    const DELETED_AT = 'emp_deleted_at';
}
