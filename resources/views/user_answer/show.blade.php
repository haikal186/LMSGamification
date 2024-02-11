@extends('layouts.quiz.template')
@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('user_answer.store', $question->id) }}">
        @csrf
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body text-center"> 
                    <div class="round-time-bar">
                        <div class="progress"></div>
                    </div>
                    <div class="timer mt-3">
                        <span id="countdown" name="countdown" value="countdown"></span> seconds remaining
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-6 ">
                    @if($file_question)
                        <div class="card">
                            <img class="card-img-top rounded" src="{{ asset($file_question->file_path) }}" alt="Card image cap">
                        </div>
                    @else
                        <div class="card">
                            <img class="card-img-top rounded" src="{{ asset('/images/card/2.png') }}" alt="Card image cap">
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h5>{{ $question->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <h4 class="fs-20 font-w600 mb-0 me-auto">Answers :</h4>
            </div>
            @foreach ($answers as $key => $answer)
            <div class="col-xl-6">
                <div class="card text">
                    <div class="card-body mb-0">
                        <p class="card-text"><b>{{ $key+1 }}.</b> {{ $answer->name }}</p>
                        <label class="checkbox-inline me-3">
                            <input type="checkbox" name="answer" value="{{ $answer->id }}">
                        </label>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="card-footer text-end">
                <div>
                    @if ($is_last_question)
                        <button class="btn btn-primary" type="submit">Submit</button>
                    @else
                        <button class="btn btn-primary" type="submit">Next</button>
                     @endif
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .round-time-bar {
        margin: 0 auto; /* Center the timer bar */
        overflow: hidden;
        width: 100%; /* Set the width for the progress bar container */
        height: 5px; /* Set the height of the progress bar */
        background: #ddd; /* Set a background color for the progress bar container */
    }

    .round-time-bar .progress {
        height: 100%;
        background: linear-gradient(to left, red, #900); /* Set the progress bar color and direction */
        transition: width linear; /* Apply a smooth width transition */
        width: 100%; /* Set initial width to start animation from */
    }

    .timer {
        font-size: 14px;
    }
</style>

<script>
    let quiz_duration = {{ $quiz_duration }}; // Assuming $quiz_duration is passed from the backend

    // Function to set the remaining time in a hidden input field in the form
    function setRemainingTimeInForm() {
        const countdown = document.getElementById('countdown');
        const remainingTime = parseInt(countdown.textContent); // Get the remaining time from the countdown span

        // Create a hidden input field to store the remaining time
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'remaining_time'; // Set the name for the hidden input
        hiddenInput.value = remainingTime;

        // Append the hidden input field to the form
        const form = document.querySelector('form'); // Assuming only one form on the page
        form.appendChild(hiddenInput);
    }

    // Function to clear remaining time cookie
    function clearRemainingTimeCookie() {
        document.cookie = 'remainingTime=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
    }

    // Function to set the remainingTime cookie
    function setRemainingTimeCookie(value) {
        document.cookie = `remainingTime=${value}; path=/`;
    }

    // Function to initialize timer
    function initializeTimer(duration) {
        // Get the progress bar element
        const progressBar = document.querySelector(".round-time-bar .progress");
        const countdown = document.getElementById('countdown');

        // Set the initial progress bar width and transition duration
        progressBar.style.transitionDuration = `${duration}s`;
        progressBar.style.width = '100%';

        // Function to update countdown timer
        function updateCountdown(seconds) {
            countdown.textContent = seconds;
        }

        // Timer logic
        let timeLeft = duration;
        const countdownInterval = setInterval(() => {
            timeLeft--;
            updateCountdown(timeLeft);

            // Store the remaining time in the cookie
            setRemainingTimeCookie(timeLeft); // Update the remainingTime cookie

            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                // Add code here to perform actions when the timer completes
            } else {
                const progress = ((duration - timeLeft) / duration) * 100;
                progressBar.style.width = `${progress}%`;
            }
        }, 1000);

        // Clear remaining time cookie when leaving the page
        window.addEventListener('beforeunload', () => {
            clearRemainingTimeCookie();
        });

        // Call the function to set remaining time in form when the form is submitted
        document.querySelector('form').addEventListener('submit', setRemainingTimeInForm);
    }

    // Check if remaining time cookie exists on page load
    document.addEventListener('DOMContentLoaded', () => {
        let remainingTime = parseInt(document.cookie.replace(/(?:(?:^|.*;\s*)remainingTime\s*\=\s*([^;]*).*$)|^.*$/, "$1"));
        let storedQuizId = parseInt(localStorage.getItem('quiz_id')); // Retrieve stored quiz ID
        let currentQuizId = {{ $question->quiz->id }}; // Get current quiz ID from $question

        if ((isNaN(remainingTime) || remainingTime <= 0) || storedQuizId !== currentQuizId) {
            initializeTimer(quiz_duration);
        } else {
            initializeTimer(remainingTime);
        }

        // Store current quiz ID to local storage
        localStorage.setItem('quiz_id', currentQuizId);
    });

    // Reset quiz_id in localStorage when the user submits the form
    document.querySelector('form').addEventListener('submit', () => {
        localStorage.removeItem('quiz_id');
    });
</script>

@endsection

