@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Users</h1>
        <a href="{{ url('admin.createUser') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Create User
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through users -->
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
