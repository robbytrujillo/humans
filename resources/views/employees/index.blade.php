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
                    <h3>Employees</h3>
                    <p class="text-subtitle text-muted">Handle employee data or profile</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Employee</li>
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
                        <a href="{{ route('employees.create') }}" class="mb-3 btn btn-primary ms-auto">
                            <i class="fa-solid fa-folder-plus"></i> New Employee
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
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Birth Date</th>
                                <th>Hire Date</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->fullname }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone_number }}</td>
                                    <td>{{ $employee->address }}</td>
                                    <td>{{ $employee->birth_date }}</td>
                                    <td>{{ $employee->hire_date }}</td>
                                    <td>{{ $employee->department_id }}</td>
                                    <td>{{ $employee->role_id }}</td>
                                   
                                    <td>
                                        @if ($employee->status == 'active')
                                            <span class="text-success">{{ $employee->status }}</span>
                                        @else
                                            <span class="text-warning">{{ $employee->status }}</span>
                                        @endif
                                    </td>
                                    
                                     <td>{{ $employee->salary }}</td>
                                    <td>
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-eye"></i> View
                                        </a>

                                        {{--  @if ($employee->status == 'pending')
                                            <a href="{{ route('employees.done', $employee->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-check"></i> Done
                                            </a>
                                        @else
                                            <a href="{{ route('employees.pending', $employee->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-clock"></i> Pending
                                            </a>
                                        @endif  --}}

                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-secondary btn-sm">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        {{--  <a href="" class="btn btn-danger btn-sm">Delete</a>  --}}

                                        <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" style="display: inline">
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