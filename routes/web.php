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

// Public Routes
Route::view('/', 'dashboard');

// Authentication Routes for Guest Usersd
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [AuthenticatedSessionController::class, 'create'])->name('register');
    Route::post('/register', [AuthenticatedSessionController::class, 'store']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Authenticated and Role-Based Routes
Route::middleware('auth')->group(function () {

    // Admin Routes
    Route::middleware('checkrole:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard'); // This is the name
        Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');
        Route::get('/exams', [AdminController::class, 'manageExams'])->name('exams');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    });

    // Teacher Routes
    Route::middleware('checkRole:teacher')->prefix('teacher')->name('teacher.')->group(function () {
        Route::get('/dashboard', [TeacherController::class, 'index'])->name('dashboard'); // This is the name
        Route::get('/create-exam', [TeacherController::class, 'createExam'])->name('createExam');
        Route::post('/store-exam', [TeacherController::class, 'storeExam'])->name('storeExam');
        Route::get('/view-exams', [TeacherController::class, 'viewExams'])->name('viewExams');
    });

    // Student Routes
    Route::middleware('checkrole:student')->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard'); // This is the name
        Route::get('/exams', [StudentController::class, 'exams'])->name('exams');
        Route::get('/exam/{exam}', [StudentController::class, 'takeExam'])->name('takeExam');
        Route::post('/submit-exam/{exam}', [StudentController::class, 'submitExam'])->name('submitExam');
        Route::get('/results', [StudentController::class, 'results'])->name('results');
    });

    // Exam Routes (not role-restricted, accessible to authenticated users)
    Route::prefix('exam')->name('exam.')->group(function () {
        Route::get('/{exam}/questions', [ExamController::class, 'showQuestions'])->name('questions');
        Route::post('/submit', [ExamController::class, 'submitExam'])->name('submit');
    });
});

require __DIR__.'/auth.php';


















// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\TeacherController;
// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\ExamController;
// use App\Http\Controllers\QuestionController;
// use App\Http\Controllers\ResultController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;

// // Public Routes
// Route::view('/', 'dashboard');

// Route::view('/welcome', 'welcome');

// // Authentication Routes for Guest Users
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//     Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//     Route::get('/register', [AuthenticatedSessionController::class, 'create'])->name('register');
//     Route::post('/register', [AuthenticatedSessionController::class, 'store']);
//     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// });

// // Authenticated and Role-Based Routes
// Route::middleware('auth')->group(function () {

//     // Admin Routes
//     Route::middleware('checkrole:admin')->prefix('admin')->name('admin.')->group(function () {
//         Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
//         Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');
//         Route::get('/exams', [AdminController::class, 'manageExams'])->name('exams');
//         Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
//     });
    

//     // Teacher Routes
//     Route::middleware('checkrole:teacher')->prefix('teacher')->name('teacher.')->group(function () {
//         Route::get('/dashboard', [TeacherController::class, 'index'])->name('dashboard');
//         Route::get('/create-exam', [TeacherController::class, 'createExam'])->name('createExam');
//         Route::post('/store-exam', [TeacherController::class, 'storeExam'])->name('storeExam');
//         Route::get('/view-exams', [TeacherController::class, 'viewExams'])->name('viewExams');
//     });

//     // Student Routes
//     Route::middleware('checkrole:student')->prefix('student')->name('student.')->group(function () {
//         Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
//         Route::get('/exams', [StudentController::class, 'exams'])->name('exams');
//         Route::get('/exam/{exam}', [StudentController::class, 'takeExam'])->name('takeExam');
//         Route::post('/submit-exam/{exam}', [StudentController::class, 'submitExam'])->name('submitExam');
//         Route::get('/results', [StudentController::class, 'results'])->name('results');
//     });
    

//     // Exam Routes (not role-restricted, accessible to authenticated users)
//     Route::prefix('exam')->name('exam.')->group(function () {
//         Route::get('/{exam}/questions', [ExamController::class, 'showQuestions'])->name('questions');
//         Route::post('/submit', [ExamController::class, 'submitExam'])->name('submit');
//     });
// });

// require __DIR__.'/auth.php';



































// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\TeacherController;
// use App\Http\Controllers\StudentController;
// use App\Http\Controllers\ExamController;
// use App\Http\Controllers\QuestionController;
// use App\Http\Controllers\ResultController;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Middleware\CheckRole;


// // ... other routes



// // Public Routes
// Route::view('/', 'admin.dashboard');

// // Authentication Routes for Guest Users
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
//     Route::post('/login', [AuthenticatedSessionController::class, 'store']);
//     Route::get('/register', [AuthenticatedSessionController::class, 'create'])->name('register');
//     Route::post('/register', [AuthenticatedSessionController::class, 'store']);
//     Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// });


// // Authenticated and Role-Based Routes
// Route::middleware('auth')->group(function () {

//     // Admin Routes
//     Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
//         Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
//         Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');
//         Route::get('/exams', [AdminController::class, 'manageExams'])->name('exams');
//         Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
//     });

//     // Teacher Routes
//     Route::middleware('role:teacher')->prefix('teacher')->name('teacher.')->group(function () {
//         Route::get('/dashboard', [TeacherController::class, 'index'])->name('dashboard');
//         Route::get('/create-exam', [TeacherController::class, 'createExam'])->name('createExam');
//         Route::post('/store-exam', [TeacherController::class, 'storeExam'])->name('storeExam');
//         Route::get('/view-exams', [TeacherController::class, 'viewExams'])->name('viewExams');
//     });

//     // Student Routes
//     Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
//         Route::get('/dashboard', [StudentController::class, 'index'])->name('dashboard');
//         Route::get('/exams', [StudentController::class, 'exams'])->name('exams');
//         Route::get('/exam/{exam}', [StudentController::class, 'takeExam'])->name('takeExam');
//         Route::post('/submit-exam/{exam}', [StudentController::class, 'submitExam'])->name('submitExam');
//         Route::get('/results', [StudentController::class, 'results'])->name('results');
//         Route::get('/exam/{exam}/results', [ResultController::class, 'showResults'])->name('examResults');
//     });

//     // Exam Routes
//     Route::prefix('exam')->name('exam.')->group(function () {
//         Route::get('/{exam}/questions', [ExamController::class, 'showQuestions'])->name('questions');
//         Route::post('/submit', [ExamController::class, 'submitExam'])->name('submit');
//     });
// });

// require __DIR__.'/auth.php';



