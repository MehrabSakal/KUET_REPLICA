<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchRequest extends Model
{
    protected $fillable = [
        'faculty_id', 'student_name', 'student_email', 'student_id', 'message', 'status'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
