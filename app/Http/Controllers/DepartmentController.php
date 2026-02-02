<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index() {
        $departments = Department::all();

        return view('departments.index', compact('departments'));
    }

    public function create() {
        return view('departments.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|required',
            'status' => 'required|string|max:50',
        ]);
        
        // bisa menggunakan ini
        // Department::create($request->all());
        
        Department::create($validated);

        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }

    public function edit(Department $department) {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|required',
            'status' => 'required|string|max:50',
        ]);

        $department->update($validated);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department) {
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully');
    }
}