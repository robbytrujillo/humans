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

                    <form method="POST" action="{{ route('tasks.store') }}" class="">
                    @csrf
                        <div class="mb-b">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </div>
    
@endsection