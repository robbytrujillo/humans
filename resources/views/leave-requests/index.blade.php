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
                    <p class="text-subtitle text-muted">Handle Leave Request Data</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Leave-Request</li>
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
                        <a href="{{ route('leave-requests.create') }}" class="mb-3 btn btn-primary ms-auto">
                            <i class="fa-solid fa-folder-plus"></i> New Leave Request
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
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaveRequests as $leaveRequest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $leaveRequest->employee->fullname }}</td>
                                    <td>{{ $leaveRequest->leave_type }}</td>
                                    <td>{{ $leaveRequest->start_date }}</td>
                                    <td>{{ $leaveRequest->end_date }}</td>
                                    <td>{{ $leaveRequest->status }}</td>
                                    
                                    <td>
                                        {{--  <a href="{{ route('leaveRequests.show', $leaveRequest->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-file-alt"></i> Salary Slip
                                        </a>  --}}
                                        
                                        {{--  <a href="{{ route('leaveRequests.edit', $leaveRequest->id) }}" class="btn btn-secondary btn-sm">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>  --}}

                                        {{--  <form method="POST" action="{{ route('leaveRequests.destroy', $leaveRequest->id) }}" style="display: inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>    
                                        </form>  --}}
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