<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $guard = 'staff';

    protected $fillable = [
        'staff_id',
        'name',
        'email',
        'password',
        'type',
        'department_id',
        'designation_id',
        'phone',
        'gender',
        'dob',
        'address',
        'qualification',
        'position',
        'employment_date',
        'marital_status',
        'next_of_kin',
        'next_of_kin_phone',
        'bank_name',
        'account_number',
        'tax_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'dob' => 'date',
        'employment_date' => 'date',
        'email_verified_at' => 'datetime',
        'password_changed_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($staff) {
            $staff->staff_id = static::generateStaffId($staff->type);
        });
    }

    public static function generateStaffId($type)
    {
        $prefix = $type === 'core' ? 'C' : 'S';

        $lastStaff = static::where('staff_id', 'like', "{$prefix}-%")
            ->orderBy('staff_id', 'desc')
            ->first();

        $number = $lastStaff
            ? (int) str_replace("{$prefix}-", "", $lastStaff->staff_id) + 1
            : 1;

        return sprintf("{$prefix}-%03d", $number);
    }

    //  Relationships

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    //  Scopes

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopePotentialHods($query)
    {
        return $query->whereIn('position', ['Manager', 'Director', 'Information HOU'])
                     ->orWhereIn('type', ['core', 'support']);
    }



    // Add to your Staff model
public function getFullNameAttribute()
{
    return $this->name;
}
}
