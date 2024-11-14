<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Show the student dashboard with available exams
    public function index() {
        // Fetch exams or any necessary data to display on the dashboard
        $exams = Exam::all();
        return view('student.dashboard', compact('exams'));
    }

    // Show the exam page for a student
    public function takeExam(Exam $exam) {
        $questions = $exam->questions;
        return view('student.take_exam', compact('exam', 'questions'));
    }

    // Submit the answers
    public function submitExam(Request $request, Exam $exam) {
        $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|string'
        ]);

        foreach ($request->answers as $question_id => $answer) {
            StudentAnswer::create([
                'question_id' => $question_id,
                'student_id' => auth()->user()->id,
                'exam_id' => $exam->id,
                'answer' => $answer
            ]);
        }

        return redirect()->route('student.results')->with('success', 'Exam submitted successfully.');
    }

    // Show results for a student
    public function results() {
        $results = StudentAnswer::where('student_id', auth()->user()->id)->get();
        return view('student.results', compact('results'));
    }
}
