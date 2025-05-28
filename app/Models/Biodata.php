<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Biodata extends Model
{

    use  SoftDeletes ;
    protected $primaryKey = 'bio_id';
    protected $guarded = [];

    const CREATED_AT = 'bio_created_at';
    const UPDATED_AT = 'bio_updated_at';
    const DELETED_AT = 'bio_deleted_at';
    public function bio_religion(): BelongsTo
    {
        return $this->BelongsTo(Religion::class,'bio_religion_id');
    }
}
