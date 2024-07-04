<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'about',
        'slug',
        'history',
        'history_image',
        'tour_link',
        'tour_image',
        'tour_description',
    ];
}
