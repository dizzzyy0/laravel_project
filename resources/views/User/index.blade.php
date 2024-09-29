@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2>User List</h2>

        <!-- Success Message -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('user.create') }}" class="btn btn-info mb-3">Add New User</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sure Name</th>
                    <th>Name</th>
                    <th>Middle Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->sureName }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->middleName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
