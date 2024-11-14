<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Result;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    // Grade the exam and save the result
    public function calculateGrade(Exam $exam, $student_id) {
        $questions = $exam->questions;
        $score = 0;

        foreach ($questions as $question) {
            $studentAnswer = StudentAnswer::where('question_id', $question->id)
                                          ->where('student_id', $student_id)
                                          ->first();
            if ($studentAnswer) {
                if ($question->type == 'MCQ' && $studentAnswer->answer == $question->correct_answer) {
                    $score += 1;
                }
            }
        }

        // Save the result in the results table
        Result::create([
            'exam_id' => $exam->id,
            'student_id' => $student_id,
            'score' => $score,
        ]);

        return redirect()->route('student.examResults', $exam->id)->with('success', 'Exam graded.');
    }

    // Display result
    public function showResults(Exam $exam, $student_id) {
        $result = Result::where('exam_id', $exam->id)
                        ->where('student_id', $student_id)
                        ->first();
        return view('student.exam_results', compact('result'));
    }
}


