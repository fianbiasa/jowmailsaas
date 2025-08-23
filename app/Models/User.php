<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'membership_plan_id',
        'membership_expires_at',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'membership_expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function membershipPlan()
    {
        return $this->belongsTo(MembershipPlan::class);
    }

    public function domains()
    {
        return $this->hasMany(Domain::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function emailLists()
    {
        return $this->hasMany(EmailList::class);
    }
}
