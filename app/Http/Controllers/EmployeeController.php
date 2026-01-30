<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index() {
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    public function create() {
        $departments = Department::all();
        $roles = Role::all();

        return view('employees.create', compact('departments', 'roles'));
    }

    public function store(Request $request) {
        $request->validated([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            'birth_date' => 'required',
            'hire_date' => 'required',
            'department_id' => 'required',
            'role_id' => 'required',
            'status' => 'required',
            'salary' => 'required',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee Created Success');
    }
}