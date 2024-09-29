@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Create New Answer</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('answer.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="question_id">Question ID</label>
                <select name="question_id" class="form-control" required>
                    @foreach ($question as $ques)
                    <option value="{{ $ques->id }}" {{ old('question_id', $answer->question_id ?? '') == $ques->id ? 'selected' : '' }}>
                    {{ $ques->id}}
                    </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="answer_text">Answer Text</label>
                <textarea name="answer_text" class="form-control" placeholder="Enter answer text" required>{{ old('answer_text') }}</textarea>
            </div>

            <div class="form-group">
                <label for="is_correct">Is Correct?</label>
                <select name="is_correct" class="form-control" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-info mt-3">Create</button>
            <a href="{{ route('answer.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
