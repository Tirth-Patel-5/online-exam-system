@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Header Section -->
    <div class="text-center mb-4">
        <h1 class="display-4">Teacher Dashboard</h1>
        <p class="lead text-muted">Manage your exams and teaching resources efficiently.</p>
    </div>

    <!-- Dashboard Cards -->
    <div class="row justify-content-center">
        <!-- Card for Creating Exams -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-pencil-alt fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Create Exam</h5>
                    <p class="card-text">Design and publish new exams for your students.</p>
                    <a href="{{ route('teacher.createExam') }}" class="btn btn-outline-primary mt-3">Start Creating</a>
                </div>
            </div>
        </div>

        <!-- Card for Viewing Exams -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-book fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">View Exams</h5>
                    <p class="card-text">Review, edit, or delete previously created exams.</p>
                    <a href="{{ route('teacher.viewExams') }}" class="btn btn-outline-success mt-3">View Exams</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

