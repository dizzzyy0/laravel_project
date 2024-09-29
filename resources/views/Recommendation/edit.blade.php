@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Recommendation</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('recommendation.update', $recommendation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control" required>
                    @foreach ($user as $u)
                    <option value="{{ $u->id }}" {{ old('user_id', $recommendation->user_id ?? '') == $u->id ? 'selected' : '' }}>
                    {{ $u->name}} {{$u->sureName}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="course_id">Course ID</label>
                <select name="course_id" class="form-control" required>
                    @foreach ($course as $cou)
                    <option value="{{ $cou->id }}" {{ old('course_id', $recommendation->course_id ?? '') == $cou->id ? 'selected' : '' }}>
                    {{ $cou->id}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="recommendation_text">Recommendation Text</label>
                <textarea name="recommendation_text" class="form-control" rows="3" required>{{ $recommendation->recommendation_text }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
            <a href="{{ route('recommendation.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
