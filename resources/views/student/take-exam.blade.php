@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $exam->exam_name }}</h1>
        <form action="{{ route('student.submitExam', $exam->id) }}" method="POST">
            @csrf
            @foreach($exam->questions as $question)
                <div class="form-group">
                    <label>{{ $question->question_text }}</label>
                    @foreach($question->options as $option)
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                            <label class="form-check-label">{{ $option->option_text }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Submit Exam</button>
        </form>
    </div>
@endsection
