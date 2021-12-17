<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = [
        'timestamp',
        'team_id',
        'type',
        'subtype',
        'client_msg_id',
        'user_id',
        'bot_id',
        'text',
    ];
}
