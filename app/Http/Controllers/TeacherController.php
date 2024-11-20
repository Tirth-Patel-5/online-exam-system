<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class TeacherController extends Controller
{
    public function index() {
        return view('teacher.dashboard');
    }

    public function createExam() {
        return view('teacher.create-exam');
    }

    public function storeExam(Request $request) {
        $exam = new Exam();
        $exam->title = $request->title;
        $exam->start_time = $request->start_time;
        $exam->end_time = $request->end_time;
        $exam->teacher_id = auth()->id();
        $exam->save();

        return redirect()->route('teacher.viewExams');
    }

    public function viewExams() {
        $exams = Exam::where('teacher_id', auth()->id())->get();
        return view('teacher.view-exams', compact('exams'));
    }
}

