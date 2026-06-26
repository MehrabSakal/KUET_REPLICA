<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['teacher_id', 'name', 'designation', 'department', 'research_interest', 'published_papers', 'image'];
}
