@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $exam->title }}</h2>
    <p>{{ $exam->description }}</p>
    <form action="{{ route('student.submitExam', $exam->id) }}" method="POST">
        @csrf
        @foreach($questions as $question)
            <div class="question">
                <p><strong>{{ $loop->iteration }}. {{ $question->text }}</strong></p>
                @if($question->type == 'MCQ')
                    @php
                        $options = json_decode($question->options);
                    @endphp
                    @foreach($options as $option)
                        <div class="form-check">
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" class="form-check-input" required>
                            <label class="form-check-label">{{ $option }}</label>
                        </div>
                    @endforeach
                @else
                    <textarea name="answers[{{ $question->id }}]" class="form-control" rows="4"></textarea>
                @endif
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit Exam</button>
    </form>

    <script>
    let timeRemaining = {{ $exam->end_time->diffInSeconds($exam->start_time) }};
    const timerElement = document.getElementById('timer');
    
    function updateTimer() {
        const minutes = Math.floor(timeRemaining / 60);
        const seconds = timeRemaining % 60;
        timerElement.innerText = `${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
        
        if (timeRemaining <= 0) {
            document.getElementById('exam-form').submit();  // Automatically submit the form when time is up
        } else {
            timeRemaining--;
        }
    }

    setInterval(updateTimer, 1000); // Update every second
</script>

<p id="timer" style="font-size: 24px; font-weight: bold;"></p>

<script>
    $('form').submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        const formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                alert('Exam submitted successfully!');
                window.location.href = response.redirect_url; // Redirect to result page
            },
            error: function(xhr) {
                alert('An error occurred while submitting the exam. Please try again.');
            }
        });
    });
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Your exam content here -->
        </div>
    </div>
</div>



</div>
@endsection

this is not the page