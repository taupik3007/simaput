<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biodata extends Model
{

    use  SoftDeletes ;
    protected $primaryKey = 'bio_id';
    protected $guarded = [];

    const CREATED_AT = 'bio_created_at';
    const UPDATED_AT = 'bio_updated_at';
    const DELETED_AT = 'bio_deleted_at';
}
