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
                        Data
                    </h5>
                </div>
                <div class="card-body">

                    <div class="d-flex">
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3 ms-auto">New Task</a>
                    </div>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                {{--  <th>Description</th>  --}}
                                <th>Assigned To</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->title }}</td>
                                    {{--  <td>{{ $task->description }}</td>  --}}
                                    <td>{{ $task->employee->fullname }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>

                                        @if ($task->status == 'pending')
                                            <span class="text-warning">Pending</span>
                                        @elseif ($task->status == 'done')
                                            <span class="text-success">Done</span>
                                        @else
                                            <span class="text-success">{{ $task->status }}</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">View</a>

                                        @if ($task->status == 'pending')
                                            <a href="" class="btn btn-success btn-sm">Done</a>
                                        @else
                                            <a href="" class="btn btn-warning btn-sm">Pending</a>
                                        @endif

                                        <a href="" class="btn btn-secondary btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
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