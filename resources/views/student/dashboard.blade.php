@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Dashboard</h1>
        <ul>
            <li><a href="{{ route('student.exams') }}">Available Exams</a></li>
            <li><a href="{{ route('student.results') }}">View Results</a></li>
        </ul>
    </div>
@endsection
