<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    //
    public function index() {
        $presences = Presence::all();

        return view('presences.index', compact('presences'));
    }

    public function create() {
        $employees = Employee::all();
        
        return view('presences.create', compact('employees'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'employee_id' => 'required|string|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'date' => 'required|date',
            'status' => 'required|string|max:255',
        ]);

        Presence::create($validated);

        return redirect()->route('presences.index')->with('success', 'Presence recorded successfully');
    }
}