<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Show form to add questions to an exam
    public function addQuestionForm(Exam $exam) {
        return view('teacher.add_question', compact('exam'));
    }

    // Store questions for an exam
    public function storeQuestion(Request $request, Exam $exam) {
        $question = new Question();
        $question->exam_id = $exam->id;
        $question->text = $request->text;
        $question->type = $request->type;

        // Store options if it's an MCQ
        if ($request->type == 'MCQ') {
            $question->options = json_encode($request->options);
            $question->correct_answer = $request->correct_answer;
        } else {
            $question->correct_answer = $request->correct_answer;
        }

        $question->save();
        return redirect()->route('teacher.viewExams')->with('success', 'Question added.');
    }
}

