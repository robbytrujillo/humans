<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    //
    public function index() {
        $leaveRequests = LeaveRequest::all();

        return view('leave-requests.index', compact('leaveRequests'));
    }

    public function create() {
        $employees = Employee::all();

        return view('leave-requests.create', compact('employees'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'employee_id' => 'required|string|max:255',
            'leave_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            // 'status' => 'required|string|max:255'',
        ]);

        // $netSalary = $request->input('salary') + $request->input('bonuses') - $request->input('deductions');
        // $request->merge(['net_salary' => $netSalary]);

        // $validated['net_salary'] = $validated['salary'] + $validated['bonuses'] - $validated['deductions'];

        LeaveRequest::create($validated);

        return redirect()->route('leave-requests.index')->with('success', 'Leave Request created successfully');
    }
}