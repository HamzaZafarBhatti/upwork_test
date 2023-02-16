<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'is_mandatory',
        'quiz_id',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
    protected $casts = [
        'is_mandatory' => 'boolean',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
