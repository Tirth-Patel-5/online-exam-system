@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Teacher Dashboard</h1>
        <ul>
            <li><a href="{{ route('teacher.createExam') }}">Create Exam</a></li>
            <li><a href="{{ route('teacher.viewExams') }}">View Exams</a></li>
        </ul>
    </div>
@endsection
