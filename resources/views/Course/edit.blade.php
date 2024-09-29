@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Course</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('course.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Course Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter course title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
            <label for="type">Type</label>
                <select name="type" class="form-control" required>
                    <option value="">Select type</option>
                    <option value="soft skills" {{ old('type', $course->type ?? '') == 'soft skills' ? 'selected' : '' }}>Soft skills</option>
                    <option value="hard skills" {{ old('type', $course->type ?? '') == 'hard skills' ? 'selected' : '' }}>Hard skills</option>
                    <option value="programming language" {{ old('type', $course->type ?? '') == 'programming language' ? 'selected' : '' }}>Programming language</option>
                </select>
            </div>

            <div class="form-group">
                <label for="programming_language_id">Programming Language</label>
                <select name="programming_language_id" class="form-control" required>
                    @foreach ($programmingLanguages as $prog)
                    <option value="{{ $prog->id }}" {{ old('programming_language_id', $course->programming_language_id ?? '') == $prog->id ? 'selected' : '' }}>
                        {{ $prog->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
            <label for="difficulty_level">Difficulty Level</label>
                <select name="difficulty_level" class="form-control" required>
                    <option value="">Select difficulty level</option>
                    <option value="easy" {{ old('difficulty_level', $course->difficulty_level ?? '') == 'easy' ? 'selected' : '' }}>Easy</option>
                    <option value="normal" {{ old('difficulty_level', $course->difficulty_level ?? '') == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="hard" {{ old('difficulty_level', $course->difficulty_level ?? '') == 'hard' ? 'selected' : '' }}>Hard</option>
                    
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

            <button type="submit" class="btn btn-success mt-3">Update</button>
            <a href="{{ route('course.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
