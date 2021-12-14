<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUsers extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = [
        'teamid', 
        'name',
        'deleted',
        'color',
        'real_name',
        'img_url'
    ];    
}
