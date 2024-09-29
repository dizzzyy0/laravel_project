@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">User Progress List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('userProgress.create') }}" class="btn btn-info mb-3">Add New User Progress</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Course ID</th>
                    <th>Lesson ID</th>
                    <th>Quiz ID</th>
                    <th>Status</th>
                    <th>Score</th>
                    <th>Completion Percentage</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($progress as $prog)
                    <tr>
                        <td>{{ $prog->id }}</td>
                        <td>{{ $prog->user_id }}</td>
                        <td>{{ $prog->course_id }}</td>
                        <td>{{ $prog->lesson_id }}</td>
                        <td>{{ $prog->quiz_id }}</td>
                        <td>{{ $prog->status }}</td>
                        <td>{{ $prog->score }}</td>
                        <td>{{ number_format($prog->completion_percentage, 2) }}%</td>
                        <td>
                            <a href="{{ route('userProgress.edit', $prog->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('userProgress.destroy', $prog->id) }}" method="POST" style="display:inline-block;">
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
