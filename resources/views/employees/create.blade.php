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
                            <li class="breadcrumb-item active" aria-current="page">New</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Create Employee
                    </h5>
                </div>
                <div class="card-body">

                    {{--  <div class="d-flex">
                        <a href="{{ route('tasks.create') }}" class="mb-3 btn btn-primary ms-auto">New Task</a>
                    </div>  --}}
                    <div class="container">
                        <form method="POST" action="{{ route('employees.store') }}" >
                        @csrf
                            <div class="mb-2">
                                <label class="form-label">Fullname</label>
                                <input type="text" class="form-control" name="fullname" required>
                                @error('fullname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" required>
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                             <div class="mb-2">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address"></textarea>
                                </select>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Birth date</label>
                                <input type="datetime-local" class="form-control date @error('birth_date') is-invalid @enderror" value="{{ @old('birth_date') }}" name="birth_date" required>
                                @error('birth_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">Hire date</label>
                                <input type="datetime-local" class="form-control date @error('hire_date') is-invalid @enderror" value="{{ @old('hire_date') }}" name="hire_date" required>
                                @error('hire_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-2">
                                <label class="form-label">Department</label>
                                <select name="department_id" id="department_id" class="form-control @error('department_id') is-invalid @enderror">
                                    <option value="">Select an employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('department_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="active">Active</option>
                                    <option value="in-active">Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"></textarea>
                                </select>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <button type="submit" class="rounded-pill btn btn-primary btn-sm">Create Task</button>
                            <a href="{{ route('tasks.index') }}" class="rounded-pill btn btn-secondary btn-sm">Back to List</a>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
    
@endsection