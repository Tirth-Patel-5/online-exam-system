<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;

class AdminController extends Controller
{
    public function index() {
        // Directly load the admin dashboard view
        return view('admin.dashboard');
    }

    public function manageUsers() {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function manageExams() {
        $exams = Exam::all();
        return view('admin.exams', compact('exams'));
    }

    public function settings() {
        return view('admin.settings');
    }
}
