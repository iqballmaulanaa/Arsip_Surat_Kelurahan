<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_number', 
        'category_id', 
        'title', 
        'file_path', 
        'upload_date'
    ];

    // Gunakan casts untuk datetime
    protected $casts = [
        'upload_date' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
