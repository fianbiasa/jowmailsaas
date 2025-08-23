<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_list_id',
        'email',
        'first_name',
        'last_name',
        'custom_fields',
        'is_active',
        'last_sent_at',
    ];

    protected $casts = [
        'custom_fields' => 'json',
        'is_active' => 'boolean',
        'last_sent_at' => 'datetime',
    ];

    public function emailList()
    {
        return $this->belongsTo(EmailList::class);
    }

    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
