@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Quiz</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('quiz.update', $quiz->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Quiz Title</label>
                <input type="text" name="title" class="form-control" value="{{ $quiz->title }}" required>
            </div>

            <div class="form-group">
                <label for="course_id">Course ID</label>
                <select name="course_id" class="form-control" required>
                    @foreach ($course as $cou)
                    <option value="{{ $cou->id }}" {{ old('course_id', $quiz->course_id ?? '') == $cou->id ? 'selected' : '' }}>
                    {{ $cou->id}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="instructor_id">Instructor</label>
                <select name="instructor_id" class="form-control" required>
                    @foreach ($user as $u)
                    <option value="{{ $u->id }}" {{ old('instructor_id', $course->instructor_id ?? '') == $u->id ? 'selected' : '' }}>
                    {{ $u->name}} {{$u->sureName}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="passing_score">Passing Score</label>
                <input type="number" name="passing_score" class="form-control" value="{{ $quiz->passing_score }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
            <a href="{{ route('quiz.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
