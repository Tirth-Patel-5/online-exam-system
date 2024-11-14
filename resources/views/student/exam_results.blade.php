@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Exam Results</h2>
    <p>Exam: {{ $exam->title }}</p>
    <p>Your Score: {{ $result->score }} / {{ $exam->questions->count() }}</p>
    <p>Status: {{ $result->score >= $exam->passing_score ? 'Passed' : 'Failed' }}</p>
    <a href="{{ route('student.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
</div>
@endsection



this not the page