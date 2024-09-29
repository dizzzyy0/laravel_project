@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Course List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('course.create') }}" class="btn btn-info mb-3">Add New Course</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Programming Language ID</th>
                    <th>Difficulty Level</th>
                    <th>Instructor ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->type }}</td>
                        <td>{{ $course->programming_language_id }}</td>
                        <td>{{ $course->difficulty_level}}</td>
                        <td>{{ $course->instructor_id}}</td>
                        <td>
                            <a href="{{ route('course.edit', $course->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
