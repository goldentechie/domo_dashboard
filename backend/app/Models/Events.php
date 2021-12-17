<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 
        'teamid',
        'type',
        'subtype',
        'client_msg_id',
        'user_id',
        'bot_id',
        'time_stamp',
        'text'
    ]; 
}
