<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramBanner extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
    'slug',
    'banner',
];
}
