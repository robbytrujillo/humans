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
                    <h3>Roles</h3>
                    <p class="text-subtitle text-muted">Handle Role Data</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Role</li>
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
                        Data Role
                    </h5>
                </div>
                <div class="card-body">

                    <div class="d-flex">
                        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3 ms-auto">
                            <i class="fa-solid fa-folder-plus"></i> New Role
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
                                <th>Title</th>
                                {{--  <th>Description</th>  --}}
                                <th>Assigned To</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->title }}</td>
                                    {{--  <td>{{ $role->description }}</td>  --}}
                                    <td>{{ $role->employee->fullname }}</td>
                                    <td>{{ $role->due_date }}</td>
                                    <td>

                                        @if ($role->status == 'pending')
                                            <span class="text-warning">Pending</span>
                                        @elseif ($role->status == 'done')
                                            <span class="text-success">Done</span>
                                        @else
                                            <span class="text-success">{{ $role->status }}</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-eye"></i> View
                                        </a>

                                        @if ($role->status == 'pending')
                                            <a href="{{ route('roles.done', $role->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-check"></i> Done
                                            </a>
                                        @else
                                            <a href="{{ route('roles.pending', $role->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-clock"></i> Pending
                                            </a>
                                        @endif

                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-secondary btn-sm">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        {{--  <a href="" class="btn btn-danger btn-sm">Delete</a>  --}}

                                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display: inline">
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