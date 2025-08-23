<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmtpServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostname',
        'ip_address',
        'ssh_username',
        'ssh_private_key',
        'config_path',
        'is_active',
        'last_connection',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_connection' => 'datetime',
    ];

    protected $hidden = [
        'ssh_private_key',
    ];
}
