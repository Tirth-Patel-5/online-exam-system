@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Exam Results</h1>
        <p>Exam: {{ $exam->exam_name }}</p>
        <p>Your Score: {{ $score }} / {{ $total }}</p>
    </div>
@endsection
