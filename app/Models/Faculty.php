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

    public function researchRequests()
    {
        return $this->hasMany(ResearchRequest::class);
    }

    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        if (str_starts_with($this->image, '/')) {
            return asset($this->image);
        }

        return asset('images/faculty/' . $this->image);
    }
}
