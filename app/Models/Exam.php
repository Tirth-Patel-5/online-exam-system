<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model {
    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function results() {
        return $this->hasMany(Result::class);
    }
}

