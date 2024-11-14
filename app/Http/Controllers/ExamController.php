<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    // Show exam creation form for teachers
    public function createExam() {
        return view('teacher.create_exam');
    }

    // Store new exam
    public function storeExam(Request $request) {
        $exam = new Exam();
        $exam->title = $request->title;
        $exam->description = $request->description;
        $exam->start_time = $request->start_time;
        $exam->end_time = $request->end_time;
        $exam->teacher_id = auth()->user()->id;
        $exam->save();

        return redirect()->route('teacher.dashboard')->with('success', 'Exam created successfully.');
    }

    // Show questions for a specific exam (student view)
    public function showQuestions(Exam $exam) {
        $questions = $exam->questions;
        return view('student.take_exam', compact('exam', 'questions'));
    }
}
