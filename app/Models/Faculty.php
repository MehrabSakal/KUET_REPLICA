<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Faculty extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'teacher_id', 'name', 'designation', 'department', 'research_interest', 'published_papers', 'image', 'email', 'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
