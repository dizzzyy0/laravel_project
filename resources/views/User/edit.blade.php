@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>Edit User</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="sure_name">Sure Name</label>
                <input type="text" name="sure_name" class="form-control" value="{{ $user->sure_name }}">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" name="middle_name" class="form-control" value="{{ $user->middle_name }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="password">Password (leave blank to keep current password)</label>
                <input type="password" name="password" class="form-control" placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="student" {{ old('role', $user->role ?? '') == 'student' ? 'selected' : '' }}>Student</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Back</a>
        </form>
    </div>
@endsection
