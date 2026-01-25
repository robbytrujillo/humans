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
                    <h3>Tasks</h3>
                    <p class="text-subtitle text-muted">Handle Employee Task</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Task</li>
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
                        Edit Task
                    </h5>
                </div>
                <div class="card-body">

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endsession

                    {{--  <div class="d-flex">
                        <a href="{{ route('tasks.create') }}" class="mb-3 btn btn-primary ms-auto">New Task</a>
                    </div>  --}}
                    <div class="container">
                        <form method="POST" action="{{ route('tasks.update') }}" >
                        @csrf
                            <div class="mb-2">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Employee</label>
                                <select name="assigned_to" id="assigned_to" class="form-control @error('assigned_to') is-invalid @enderror">
                                    <option value="">Select an employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('assigned_to')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Due date</label>
                                <input type="datetime-local" class="form-control date @error('due_date') is-invalid @enderror" value="{{ @old('due_date') }}" name="due_date" required>
                                @error('due_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="pending">Pending</option>
                                    <option value="on-progress">On Progress</option>
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