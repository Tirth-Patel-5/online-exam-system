@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Create a New Exam</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('teacher.storeExam') }}" method="POST">
                        @csrf
                        
                        <!-- Exam Name Field -->
                        <div class="form-group mb-3">
                            <label for="examName" class="form-label">Exam Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('exam_name') is-invalid @enderror" 
                                id="examName" 
                                name="exam_name" 
                                placeholder="Enter the exam name" 
                                value="{{ old('exam_name') }}" 
                                required>
                            @error('exam_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Exam Date Field -->
                        <div class="form-group mb-3">
                            <label for="examDate" class="form-label">Exam Date</label>
                            <input 
                                type="date" 
                                class="form-control @error('exam_date') is-invalid @enderror" 
                                id="examDate" 
                                name="exam_date" 
                                value="{{ old('exam_date') }}" 
                                required>
                            @error('exam_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Save Exam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
