@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Quiz List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('quiz.create') }}" class="btn btn-info mb-3">Add New Quiz</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Course ID</th>
                    <th>Instructor ID</th>
                    <th>Passing Score</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz)
                    <tr>
                        <td>{{ $quiz->id }}</td>
                        <td>{{ $quiz->title }}</td>
                        <td>{{ $quiz->course_id }}</td>
                        <td>{{ $quiz->instructor_id }}</td>
                        <td>{{ $quiz->passing_score }}</td>
                        <td>
                            <a href="{{ route('quiz.edit', $quiz->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST" style="display:inline-block;">
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
