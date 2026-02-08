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
                    <p class="text-subtitle text-muted">Handle payroll data and profile</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Payroll</li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                       Detail Payroll
                    </h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for=""><b>Employee</b></label>
                        <p>{{ $payroll->employee->fullname }}</p>
                    </div>

                    <div class="mb-3">
                        <label for=""><b>Pay Date</b></label>
                        <p>{{ \Carbon\Carbon::parse($payroll->pay_date)->format('d F Y') }}</p>
                    </div>

                    <div class="mb-3">
                        <label for=""><b>Salary</b></label>
                        <p>Rp. {{ number_format($payroll->salary) }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label for=""><b>Bonuses</b></label>
                        <p>Rp. {{ number_format($payroll->bonuses) }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label for=""><b>Deductions</b></label>
                        <p>Rp. {{ number_format($payroll->deductions) }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label for=""><b>Net Salary</b></label>
                        <p>Rp. {{ number_format($payroll->net_salary) }}</p>
                    </div>
                    
                    
                    <div class="mb-3">
                        <label for=""><b>Net Salary</b></label>
                        <p>Rp. {{ number_format($payroll->net_salary) }}</p>
                    </div>
                    
                    <button type="button" class="btn btn-primary btn-sm">
                        <i class="fas fa-print"></i>
                        Print
                    </button>
                    
                    <a href="{{ route('payrolls.index') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-arrow-left"></i>
                        Back to List
                    </a>
                
                </div>

            </div>

        </section>
    </div>
    
@endsection