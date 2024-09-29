@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Lesson List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('lesson.create') }}" class="btn btn-info mb-3">Add New Lesson</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Course ID</th>
                    <th>Title</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>
                        <td>{{ $lesson->course_id }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->order }}</td>
                        <td>
                            <a href="{{ route('lesson.edit', $lesson->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('lesson.destroy', $lesson->id) }}" method="POST" style="display:inline-block;">
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
