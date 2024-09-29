@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Recommendations List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('recommendation.create') }}" class="btn btn-info mb-3">Add New Recommendation</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Course ID</th>
                    <th>Recommendation Text</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recommendations as $recommendation)
                    <tr>
                        <td>{{ $recommendation->id }}</td>
                        <td>{{ $recommendation->user_id }}</td>
                        <td>{{ $recommendation->course_id }}</td>
                        <td>{{ $recommendation->recommendation_text }}</td>
                        <td>
                            <a href="{{ route('recommendation.edit', $recommendation->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('recommendation.destroy', $recommendation->id) }}" method="POST" style="display:inline-block;">
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
