
@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-4">
            <h1 class="display-4">Admin Dashboard</h1>
            <p class="lead text-muted">Manage all administrative settings, users, and exams from here.</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <!-- Card for Managing Users -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">Add, edit, or remove users from the platform.</p>
                    <a href="{{ url('admin/users') }}" class="btn btn-outline-primary">Go to Users</a>
                </div>
            </div>
        </div>

        <!-- Card for Managing Exams -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-file-alt fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Manage Exams</h5>
                    <p class="card-text">Create, modify, and delete exams for your users.</p>
                    <a href="{{ url('admin/exams') }}" class="btn btn-outline-success">Go to Exams</a>
                </div>
            </div>
        </div>

        <!-- Card for Settings -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <i class="fas fa-cogs fa-3x mb-3 text-warning"></i>
                    <h5 class="card-title">Settings</h5>
                    <p class="card-text">Update platform settings and configurations.</p>
                    <a href="{{ url('admin/settings') }}" class="btn btn-outline-warning">Go to Settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
