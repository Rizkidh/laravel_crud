<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ---------- AUTH ROUTES ----------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.do');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ---------- HALAMAN WELCOME ----------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello World!";
});

// ---------- ROUTE YANG WAJIB LOGIN ----------
Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [UserController::class, 'totaldashboard'])
        ->name('dashboard');

    // USERS CRUD
    Route::get('/users', [UserController::class, 'usersall'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // TASK CRUD
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/total', [TaskController::class, 'totaltasks'])->name('tasks.total');

    // UPDATE STATUS (PENTING UNTUK STATUS DROPDOWN)
    Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
        ->name('tasks.updateStatus');
});
