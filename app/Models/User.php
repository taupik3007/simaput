<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\hasOne;


class User extends Authenticatable
{
    use HasApiTokens, HasRoles, SoftDeletes;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ["id", "timestamps"];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function student_admission_registration()
{
    return $this->hasOne(StudentAdmissionRegistration::class,'sar_user_id','usr_id');
}
public function biodata()
    {
        return $this->hasOne(Biodata::class, 'bio_user_id', 'usr_id');
    }

    // Relasi ke alamat
    public function address()
    {
        return $this->hasOne(Address::class, 'adr_user_id', 'usr_id');
    }

    // Relasi ke orang tua
    public function parent()
    {
        return $this->hasOne(Parented::class, 'prn_user_id', 'usr_id');
    }

    // Relasi ke asal sekolah
    public function originSchool()
    {
        return $this->hasOne(OriginSchool::class, 'ors_user_id', 'usr_id');
    }
    public function requirementDocuments()
{
    return $this->hasMany(RequirementDocumentCollection::class, 'rdc_user_id', 'usr_id');
}
public function student()
{
    return $this->hasOne(Student::class, 'std_user_id', 'usr_id');
}
public function teachingAssignments()
{
    return $this->hasMany(TeachingAssignment::class, 'teach_teacher_id', 'usr_id');
}


    protected $primaryKey = 'usr_id';
    const CREATED_AT = 'usr_created_at';
    const UPDATED_AT = 'usr_updated_at';
    const DELETED_AT = 'usr_deleted_at';
}
