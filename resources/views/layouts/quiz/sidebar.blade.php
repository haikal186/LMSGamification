<br>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <h4 class="fs-20 font-w600 mb-0 text-center">Question List:</h4>
        </div>
        @foreach ($question_numbers as $key => $question_number)
        <div class="col-md-12">
            <a href="{{ route('user_answer.show', $question_number->id) }}" class="text-decoration-none">
                <div class="card text-center">
                    <div class="card-body mt-4">
                        <h5 class="card-text">Question {{ $key + 1 }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
