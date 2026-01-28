<?php

namespace App\Http\Controllers;

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
        return view('employees.create', compact('departments'));
    }
}