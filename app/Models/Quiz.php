<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
