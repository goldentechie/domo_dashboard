<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 
        'teamid',
        'name',
        'created',
        'num_members'
    ]; 
}
