<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {
    public function exam() {
        return $this->belongsTo(Exam::class);
    }

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }
    
    public static function calculateScore($examId, $studentId) {
        $correctAnswers = StudentAnswer::where('student_id', $studentId)
            ->whereHas('question', function ($query) use ($examId) {
                $query->where('exam_id', $examId);
            })
            ->whereColumn('answer', 'correct_answer')
            ->count();

        return $correctAnswers;
    }
}
