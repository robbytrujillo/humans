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
}