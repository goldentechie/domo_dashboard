<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        'name',
        'userid',
        'password',
        'sierrakey',
        'last_scanned',
        'slack_hook_url',
        'slack_user_token',
        'enabled',
    ];
}








