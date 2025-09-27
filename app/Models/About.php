<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about';
    
    protected $fillable = [
        'name', 
        'study_program', 
        'nim', 
        'photo_path', 
        'creation_date',
        'technologies'
    ];

    protected $casts = [
        'creation_date' => 'date',
        'technologies' => 'array'
    ];
}