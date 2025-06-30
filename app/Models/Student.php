<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use  SoftDeletes ;
    protected $primaryKey = 'std_id';
    protected $guarded = [];

    const CREATED_AT = 'std_created_at';
    const UPDATED_AT = 'std_updated_at';
    const DELETED_AT = 'std_deleted_at';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'std_user_id', 'usr_id');
    }
    public function class()
{
    return $this->belongsTo(Classes::class, 'std_class_id', 'cls_id');
}
    
}
