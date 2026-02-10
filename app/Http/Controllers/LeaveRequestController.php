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

        $validated['status'] = 'pending';
        
        LeaveRequest::create($validated);

        return redirect()->route('leave-requests.index')->with('success', 'Leave Request created successfully');
    }

    public function edit(LeaveRequest $leaveRequest) {
        $employees = Employee::all();

        return view('leave-requests.edit', compact('leaveRequest','employees'));
    }

    public function update(Request $request, LeaveRequest $leaveRequest) {
        $validated = $request->validate([
            'employee_id' => 'required|string|max:255',
            'leave_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            // 'status' => 'required|string|max:255'',
        ]);

        $validated['status'] = 'pending';
        
        $leaveRequest->update($validated);

        return redirect()->route('leave-requests.index')->with('success', 'Leave Request updated successfully');
    }

    public function confirm(int $id) {
        $leaveRequest = LeaveRequest::findOrFail($id);

        $leaveRequest->update([
            'status' => 'confirm'
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave Request confirmed successfully');
    }
    
    public function reject(int $id) {
        $leaveRequest = LeaveRequest::findOrFail($id);

        $leaveRequest->update([
            'status' => 'reject'
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave Request rejected successfully');
    }

    public function destroy(LeaveRequest $leaveRequest) {
        $leaveRequest->delete();

        return redirect()->route('leave-requests.index')->with('success', 'Leave Request deleted successfully');
    }
}