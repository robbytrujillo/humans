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
                    <h3>Leave Requests</h3>
                    <p class="text-subtitle text-muted">Handle leave request data</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Leave-Request</li>
                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Edit Leave-Request
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
                        <form method="POST" action="{{ route('leave-requests.update', $leaveRequest->id) }}" >
                        @csrf
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
                                        <option value="{{ $employee->id }}" {{ $leaveRequest->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->fullname }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('employee_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Leave Type</label>
                                <select name="leave_type" id="leave_type" class="form-control @error('leave_type') is-invalid @enderror">
                                    <option value="Sick Leave"  {{ $leaveRequest->leave_type == 'Sick Leave' ? 'selected' : '' }}>Sick Leave</option>
                                    <option value="Vacation"   {{ $leaveRequest->leave_type == 'Vacation' ? 'selected' : '' }}>Vacation</option>
                                    <option value="Annual Leave"   {{ $leaveRequest->leave_type == 'Annual Leave' ? 'selected' : '' }}>Annual Leave</option>
                                    <option value="Mounth Leave"   {{ $leaveRequest->leave_type == 'Mounth Leave' ? 'selected' : '' }}>Mounth Leave</option>
                                    <option value="Maternity Leave"   {{ $leaveRequest->leave_type == 'Maternity Leave' ? 'selected' : '' }}>Maternity Leave</option>
                                    <option value="Paternity Leave"   {{ $leaveRequest->leave_type == 'Paternity Leave' ? 'selected' : '' }}>Paternity Leave</option>
                                    <option value="Parental Leave"   {{ $leaveRequest->leave_type == 'Parental Leave' ? 'selected' : '' }}>Parental Leave</option>
                                    <option value="Marriage Leave"   {{ $leaveRequest->leave_type == 'Marriage Leave' ? 'selected' : '' }}>Marriage Leave</option>
                                    <option value="Bereavement Leave"   {{ $leaveRequest->leave_type == 'Bereavement Leave' ? 'selected' : '' }}>Bereavement Leave</option>
                                    <option value="Family Leave"   {{ $leaveRequest->leave_type == 'Family Leave' ? 'selected' : '' }}>Family Leave</option>
                                </select>
                                @error('leave_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label class="form-label">start Date</label>
                                <input type="text" class="form-control date @error('start_date') is-invalid @enderror" value="{{ @old('start_date', $leaveRequest->start_date ) }}" name="start_date" required>
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-2">
                                <label class="form-label">End Date</label>
                                <input type="text" class="form-control date @error('end_date') is-invalid @enderror" value="{{ @old('end_date', $leaveRequest->end_date ) }}" name="end_date" required>
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            

                            {{--  <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>  --}}
    
                            <button type="submit" class="btn btn-primary btn-sm">Submit Payroll</button>
                            <a href="{{ route('leave-requests.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
    
@endsection