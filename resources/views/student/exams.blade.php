@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Available Exams</h1>
        <ul>
            @foreach($exams as $exam)
                <li>
                    <a href="{{ route('student.takeExam', $exam->id) }}">{{ $exam->exam_name }}</a>
                    <span>Start Time: {{ $exam->start_time }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
