<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    //
    public function index() {
        $payrolls = Payroll::all();

        return view('payrolls.index', compact('payrolls'));
    }

    public function create() {
        $employees = Employee::all();

        return view('payrolls.create', compact('employees'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'employee_id' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'bonuses' => 'required|numeric',
            'deductions' => 'required|numeric',
            'net_salary' => 'required|numeric',
            'pay_date' => 'required|date',
        ]);

        $netSalary = $request->input('salary') - $request->input('deductions') + $request->input('bonuses');
        $request->merge(['net_salary' => $netSalary]);

        Payroll::create($validated);

        return redirect()->route('payrolls.index')->with('success', 'Payroll created successfully');
    }
}