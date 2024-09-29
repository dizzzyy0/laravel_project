@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit Programming Language</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ProgrammingLanguage.update', $programmingLanguage->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Programming Language Name</label>
                <input type="text" name="name" class="form-control" value="{{ $programmingLanguage->name }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $programmingLanguage->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
            <a href="{{ route('ProgrammingLanguage.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
