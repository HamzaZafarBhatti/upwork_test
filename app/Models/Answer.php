<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = [
        'answer',
        'is_right',
        'question_id',
    ];
    
    protected $casts = [
        'is_right' => 'boolean',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
