@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <ul>
            <li><a href="{{ url('admin.users') }}">Manage Users</a></li>
            <li><a href="{{ url('admin.exams') }}">Manage Exams</a></li>
            <li><a href="{{ url('admin.settings') }}">Settings</a></li>
        </ul>
    </div>
@endsection
