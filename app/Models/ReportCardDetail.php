<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportCardDetail extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'rcd_id';
    protected $guarded = [];

    const CREATED_AT = 'rcd_created_at';
    const UPDATED_AT = 'rcd_updated_at';
    const DELETED_AT = 'rcd_deleted_at';

    // 🔁 Relasi ke ReportCard
    public function reportCard()
    {
        return $this->belongsTo(ReportCard::class, 'rcd_report_card_id', 'rpc_id');
    }

    // 🔁 Relasi ke TeachingAssignment
    public function teaching()
    {
        return $this->belongsTo(TeachingAssignment::class, 'rcd_teaching_id', 'teach_id');
    }

    // 🔁 Relasi ke user (yang membuat)
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'rcd_created_by', 'usr_id');
    }

    // 🔁 Relasi ke user (yang mengubah)
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'rcd_updated_by', 'usr_id');
    }

    // 🔁 Relasi ke user (yang menghapus)
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'rcd_deleted_by', 'usr_id');
    }
}
