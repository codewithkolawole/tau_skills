<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'text',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'gender',
        'date',
        'faculty',
        'dept',
        'gpa',

    ];
}
