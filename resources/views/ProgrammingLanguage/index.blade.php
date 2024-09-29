@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Programming Language List</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('ProgrammingLanguage.create') }}" class="btn btn-info mb-3">Add New Programming Language</a>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programmingLanguages as $language)
                    <tr>
                        <td>{{ $language->id }}</td>
                        <td>{{ $language->name }}</td>
                        <td>{{ $language->description }}</td>
                        <td>
                            <a href="{{ route('ProgrammingLanguage.edit', $language->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('ProgrammingLanguage.destroy', $language->id) }}" method="POST" style="display:inline-block;">
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
