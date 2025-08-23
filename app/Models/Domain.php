<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'domain',
        'is_verified_dkim',
        'is_verified_spf',
        'dkim_record',
        'spf_record',
        'is_active',
    ];

    protected $casts = [
        'is_verified_dkim' => 'boolean',
        'is_verified_spf' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
