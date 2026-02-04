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
                    <p class="text-subtitle text-muted">Handle Employee Payroll</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Payroll</li>
                            <li class="breadcrumb-item active" aria-current="page">Index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Data
                    </h5>
                </div>
                <div class="card-body">

                    <div class="d-flex">
                        <a href="{{ route('presences.create') }}" class="btn btn-primary mb-3 ms-auto">
                            <i class="fa-solid fa-folder-plus"></i> New Payroll
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Employee</th>
                                <th>Salary</th>
                                <th>Bonuses</th>
                                <th>Deductions</th>
                                <th>Net Salary</th>
                                <th>Pay Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payrolls as $payroll)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payroll->employee->fullname }}</td>
                                    <td>{{ number_format($payroll->salary) }}</td>
                                    <td>{{ number_format($payroll->bonuses) }}</td>
                                    <td>{{ number_format($payroll->deductions) }}</td>
                                    <td>{{ number_format($payroll->net_salary) }}</td>
                                    <td>{{ $payroll->pay_date }}</td>
                                    {{--  <td>
                                        @if ($payroll->status == 'present')
                                            <span class="text-success">Present</span>
                                        @else
                                            <span class="text-danger">{{ ucfirst($payroll->status) }}</span>
                                        @endif
                                    </td>  --}}
                                    <td>
                                        <a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-secondary btn-sm">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>

                                        <form method="POST" action="{{ route('payrolls.destroy', $payroll->id) }}" style="display: inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>    
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    
@endsection