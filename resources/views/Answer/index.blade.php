@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Answer List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('answer.create') }}" class="btn btn-info mb-3">Add New Answer</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Question ID</th>
                    <th>Answer Text</th>
                    <th>Is Correct?</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($answers as $answer)
                    <tr>
                        <td>{{ $answer->id }}</td>
                        <td>{{ $answer->question_id }}</td>
                        <td>{{ $answer->answer_text }}</td>
                        <td>{{ $answer->is_correct ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('answer.edit', $answer->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('answer.destroy', $answer->id) }}" method="POST" style="display:inline-block;">
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
