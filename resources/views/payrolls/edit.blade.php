@extends('layouts.dashboard')

@section('content')
        
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Payrolls</h3>
                    <p class="text-subtitle text-muted">Handle payroll data</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Payroll</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Edit Payroll
                    </h5>
                </div>
                <div class="card-body">

                    {{--  <div class="d-flex">
                        <a href="{{ route('tasks.create') }}" class="mb-3 btn btn-primary ms-auto">New Task</a>
                    </div>  --}}

                    @if ($errors->any()) 
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="container">
                        <form method="POST" action="{{ route('payrolls.update', $payroll->id) }}" >
                        @csrf
                        @method('PUT')
                            {{--  <div class="mb-2">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>  --}}
    
                            <div class="mb-2">
                                <label class="form-label">Employee</label>
                                <select name="employee_id" id="employee_id" class="form-control @error('employee_id') is-invalid @enderror">
                                    <option value="">Select an employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" {{ $payroll->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->fullname }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('employee_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Salary</label>
                                <input type="number" class="form-control @error('salary') is-invalid @enderror" value="{{ @old('salary', $payroll->salary ) }}" name="salary" required>
                                @error('salary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Bonuses</label>
                                <input type="number" class="form-control @error('bonuses') is-invalid @enderror" value="{{ @old('bonuses', $payroll->bonuses ) }}" name="bonuses" required>
                                @error('bonuses')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Deductions</label>
                                <input type="number" class="form-control @error('deductions') is-invalid @enderror" value="{{ @old('deductions', $payroll->deductions ) }}" name="deductions" required>
                                @error('deductions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            {{--  <div class="mb-2">
                                <label class="form-label">Net Salary</label>
                                <input type="number" class="form-control @error('net_salary') is-invalid @enderror" value="{{ @old('net_salary') }}" name="net_salary" disabled>
                                @error('net_salary')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>  --}}


                            <div class="mb-2">
                                <label class="form-label">Pay Date</label>
                                <input type="text" class="form-control date @error('pay_date') is-invalid @enderror" value="{{ @old('pay_date', $payroll->pay_date ) }}" name="pay_date" required>
                                @error('pay_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-sync-alt"></i>
                                Update Payroll
                            </button>
                            <a href="{{ route('payrolls.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i>
                                Back to List
                            </a>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
    
@endsection