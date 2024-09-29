@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Create New Programming Language</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ProgrammingLanguage.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Programming Language Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter programming language name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-info mt-3">Create</button>
            <a href="{{ route('ProgrammingLanguage.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
