@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Create New Lesson</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('lesson.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="course_id">Course ID</label>
                <select name="course_id" class="form-control" required>
                    @foreach ($course as $cou)
                    <option value="{{ $cou->id }}" {{ old('course_id', $lesson->course_id ?? '') == $cou->id ? 'selected' : '' }}>
                    {{ $cou->id}}
                    </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter lesson title" required>
            </div>

            <div class="form-group">
                <label for="order">Order</label>
                <input type="number" name="order" class="form-control" placeholder="Enter order" required>
            </div>

            <button type="submit" class="btn btn-info mt-3">Create</button>
            <a href="{{ route('lesson.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
