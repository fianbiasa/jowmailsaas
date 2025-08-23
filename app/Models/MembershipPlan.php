<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'monthly_email_limit',
        'max_domains',
        'price_monthly',
        'price_yearly',
        'is_active',
    ];

    protected $casts = [
        'monthly_email_limit' => 'integer',
        'max_domains' => 'integer',
        'price_monthly' => 'decimal:2',
        'price_yearly' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
