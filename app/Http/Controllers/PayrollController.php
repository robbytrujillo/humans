<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    //
    public function index() {
        if (session('role') == 'HR') {
            $payrolls = Payroll::all();
        } else {
            $payrolls = Payroll::where('employee_id', session('employee_id'))->get();
        }
        
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
            // 'net_salary' => 'required|numeric',
            'pay_date' => 'required|date',
        ]);

        // $netSalary = $request->input('salary') + $request->input('bonuses') - $request->input('deductions');
        // $request->merge(['net_salary' => $netSalary]);

        $validated['net_salary'] = $validated['salary'] + $validated['bonuses'] - $validated['deductions'];

        Payroll::create($validated);

        return redirect()->route('payrolls.index')->with('success', 'Payroll created successfully');
    }

    public function show($id) {
        $payroll = Payroll::findOrFail($id);

        return view('payrolls.show', compact('payroll'));
    }

    public function edit(Payroll $payroll) {
        $employees = Employee::all();

        return view('payrolls.edit', compact('payroll', 'employees'));
    }

    public function update(Request $request, Payroll $payroll) {
         $validated = $request->validate([
            'employee_id' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'bonuses' => 'required|numeric',
            'deductions' => 'required|numeric',
            // 'net_salary' => 'required|numeric',
            'pay_date' => 'required|date',
        ]);

        $validated['net_salary'] = $validated['salary'] + $validated['bonuses'] - $validated['deductions'];

        $payroll->update($validated);

        return redirect()->route('payrolls.index')->with('success', 'Payroll updated successfully');
    }

    public function destroy(Payroll $payroll) {
        $payroll->delete();

        return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully');
    }
}