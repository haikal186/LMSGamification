<div class="row justify-content-center align-items-center">
    @foreach ($questions as $question)
    <a href="{{ route('question.show', $question->id) }}">
    <div class="col-xl-10">
        <div class="card text-center">
            <div class="card-body mt-4">
                <h5 class="card-text">Question {{ $question->id }}</h5>
            </div>
        </div>
    </div>
    </a>
    @endforeach
    <div class="col-lg-8">
        <a href="{{ route('question.create', $quiz->id) }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Question</a>
        {{-- <a href="{{ route('course.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Question</a> --}}
    </div>
</div>