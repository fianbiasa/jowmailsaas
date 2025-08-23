<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'domain_id',
        'email_list_id',
        'name',
        'subject',
        'content',
        'from_name',
        'from_email',
        'reply_to',
        'status',
        'scheduled_at',
        'total_recipients',
        'sent_count',
        'opened_count',
        'clicked_count',
        'bounced_count',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'total_recipients' => 'integer',
        'sent_count' => 'integer',
        'opened_count' => 'integer',
        'clicked_count' => 'integer',
        'bounced_count' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function emailList()
    {
        return $this->belongsTo(EmailList::class);
    }
}
