<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\Role;
use App\Models\Question;
use App\Models\StudentAnswer;
use App\Models\Result;

class AdminController extends Controller
{
    public function index() {
        // Directly load the admin dashboard view
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
        $this->authorize('manage-users'); // Ensure permission is defined
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
