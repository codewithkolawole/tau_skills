<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'text',
        'choose_file',
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
