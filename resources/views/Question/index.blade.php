@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Question List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('question.create') }}" class="btn btn-info mb-3">Add New Question</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Quiz ID</th>
                    <th>Question Text</th>
                    <th>Question Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->quiz_id }}</td>
                        <td>{{ $question->question_text }}</td>
                        <td>{{ $question->question_type }}</td>
                        <td>
                            <a href="{{ route('question.edit', $question->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('question.destroy', $question->id) }}" method="POST" style="display:inline-block;">
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
