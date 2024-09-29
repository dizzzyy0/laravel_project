@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Question</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('question.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')

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
                <textarea name="question_text" class="form-control" required>{{ $question->question_text }}</textarea>
            </div>

            <div class="form-group">
                <label for="question_type">Question Type</label>
                <input type="text" name="question_type" class="form-control" value="{{ $question->question_type }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
            <a href="{{ route('question.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
