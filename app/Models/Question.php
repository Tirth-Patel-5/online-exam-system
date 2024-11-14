<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
    protected $casts = [
        'options' => 'array',
    ];

    public function exam() {
        return $this->belongsTo(Exam::class);
    }

    public function studentAnswers() {
        return $this->hasMany(StudentAnswer::class);
    }
}

