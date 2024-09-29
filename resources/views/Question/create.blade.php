@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Create New Question</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('question.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="quiz_id">Quiz ID</label>
                <select name="quiz_id" class="form-control" required>
                    @foreach ($quiz as $qu)
                    <option value="{{ $qu->id }}" {{ old('quiz_id', $question->quiz_id ?? '') == $qu->id ? 'selected' : '' }}>
                    {{ $qu->id}}
                    </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="question_text">Question Text</label>
                <textarea name="question_text" class="form-control" placeholder="Enter question text" required></textarea>
            </div>

            <div class="form-group">
                <label for="question_type">Question Type</label>
                <input type="text" name="question_type" class="form-control" placeholder="Enter question type" required>
            </div>

            <button type="submit" class="btn btn-info mt-3">Create</button>
            <a href="{{ route('question.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
