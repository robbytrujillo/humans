<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Handle Employees
Route::rescource('/employees', EmployeeController::class);

// Handle Tasks
Route::resource('/tasks', TaskController::class);

// Handle tasks done and pending
Route::get('/tasks/done/{id}', [TaskController::class, 'done'])->name('tasks.done');
Route::get('/tasks/pending/{id}', [TaskController::class, 'pending'])->name('tasks.pending');

// Route::get('/dashboard', [DashboardController::class, 'index']->name('dashboard'));

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';