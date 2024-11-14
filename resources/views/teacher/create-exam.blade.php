@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Exam</h1>
        <form action="{{ route('teacher.storeExam') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="examName">Exam Name</label>
                <input type="text" class="form-control" id="examName" name="exam_name" required>
            </div>
            <div class="form-group">
                <label for="examDate">Exam Date</label>
                <input type="date" class="form-control" id="examDate" name="exam_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Exam</button>
        </form>
    </div>
@endsection
