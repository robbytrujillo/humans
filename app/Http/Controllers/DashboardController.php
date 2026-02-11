<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Payroll;
use App\Models\Presence;
use App\Models\Task;

class DashboardController extends Controller
{
    //
    public function index() {
        $employees = Employee::count();
        $departments = Department::count();
        $payrolls = Payroll::count();
        $presences = Presence::count();
        $tasks = Task::count();


        return view('dashboard.index', compact('employees', 'departments', 'payrolls', 'presences', 'tasks' ));
    }
}