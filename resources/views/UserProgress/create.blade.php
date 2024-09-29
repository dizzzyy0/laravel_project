@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Create New User Progress</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('userProgress.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control" required>
                    @foreach ($user as $u)
                    <option value="{{ $u->id }}" {{ old('user_id', $progress->user_id ?? '') == $u->id ? 'selected' : '' }}>
                    {{ $u->name}} {{$u->sureName}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="course_id">Course ID</label>
                <select name="course_id" class="form-control" required>
                    @foreach ($course as $cou)
                    <option value="{{ $cou->id }}" {{ old('course_id', $progress->course_id ?? '') == $cou->id ? 'selected' : '' }}>
                    {{ $cou->id}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="lesson_id">Lesson ID</label>
                <select name="lesson_id" class="form-control" required>
                    @foreach ($lesson as $le)
                    <option value="{{ $le->id }}" {{ old('lesson_id', $progress->lesson_id ?? '') == $le->id ? 'selected' : '' }}>
                    {{ $le->id}}
                    </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="quiz_id">Quiz ID</label>
                <select name="quiz_id" class="form-control" required>
                    @foreach ($quiz as $qu)
                    <option value="{{ $qu->id }}" {{ old('quiz_id', $progress->quiz_id ?? '') == $qu->id ? 'selected' : '' }}>
                    {{ $qu->id}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" placeholder="Enter status" required>
            </div>

            <div class="form-group">
                <label for="score">Score</label>
                <input type="number" name="score" class="form-control" placeholder="Enter score">
            </div>

            <div class="form-group">
                <label for="completion_percentage">Completion Percentage</label>
                <input type="number" name="completion_percentage" class="form-control" placeholder="Enter completion percentage" step="0.01" min="0" max="100">
            </div>

            <button type="submit" class="btn btn-info mt-3">Create</button>
            <a href="{{ route('userProgress.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
