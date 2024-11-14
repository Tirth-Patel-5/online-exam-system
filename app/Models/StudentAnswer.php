<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class StudentAnswer extends Model {
    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function isCorrect() {
        return $this->answer === $this->question->correct_answer;
    }
}

