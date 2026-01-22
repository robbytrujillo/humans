<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function index() {
        $tasks = Task::all();
        // dd($tasks);

        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        $employees = Employee::all();
        return view('tasks.create', compact('employees'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required',
            'due_date' => 'required|date',
            'status' => 'required|string',
        ]);

        // Jika berhasil
        Task::create($validated);
    }
}