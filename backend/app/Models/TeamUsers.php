<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'team_id',
        'name',
        'deleted',
        'color',
        'real_name',
        'email',
        'img_url',
    ];
}
