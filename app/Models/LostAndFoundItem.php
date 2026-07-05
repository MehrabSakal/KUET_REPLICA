<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostAndFoundItem extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'location',
        'date',
        'contact_info',
        'image_path',
        'status',
    ];
}
