@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Create New User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="sureName">Sure Name</label>
                <input type="text" name="sureName" class="form-control" placeholder="Enter sure name" required>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter name" required>
            </div>

            <div class="form-group">
                <label for="middleName">Middle Name</label>
                <input type="text" name="middleName" class="form-control" placeholder="Enter middle name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="student" {{ old('role', $user->role ?? '') == 'student' ? 'selected' : '' }}>Student</option>
                </select>
            </div>

            <button type="submit" class="btn btn-info mt-3">Create</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
