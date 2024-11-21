<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use APP\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;



Route::middleware('auth')->get('/dashboard', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    } elseif ($user->hasRole('teacher')) {
        return redirect()->route('teacher.dashboard');
    } elseif ($user->hasRole('student')) {
        return redirect()->route('student.dashboard');
    }

    abort(403, 'Unauthorized access. No valid role assigned.');
})->name('dashboard');



Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



Route::view('/', 'dashboard');


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::get('/exams', [AdminController::class, 'manageExams'])->name('admin.exams');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
});




Route::prefix('teacher')->middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/create-exam', [TeacherController::class, 'createExam'])->name('teacher.createExam');
    Route::get('/view-exams', [TeacherController::class, 'viewExams'])->name('teacher.viewExams');
    Route::post('/store-exam', [TeacherController::class, 'storeExam'])->name('teacher.storeExam');
});



Route::prefix('student')->middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::get('/exams', [StudentController::class, 'exams'])->name('student.exams');
    Route::get('/exam/{exam}', [StudentController::class, 'takeExam'])->name('student.takeExam');
    Route::get('/results', [StudentController::class, 'results'])->name('student.results');
    Route::post('/submit-exam/{exam}', [StudentController::class, 'submitExam'])->name('student.submitExam');
});



require __DIR__.'/auth.php';
