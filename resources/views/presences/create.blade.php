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
                    <h3>Presences</h3>
                    <p class="text-subtitle text-muted">Handle employee presence</p>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Presence</li>
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
                        Create Presence
                    </h5>
                </div>
                <div class="card-body">

                    @if (session('role') == 'HR')
                        <form method="POST" action="{{ route('presences.store') }}" >
                        @csrf
                           
                            <div class="mb-2">
                                <label class="form-label">Employee</label>
                                <select name="employee_id" id="employee_id" class="form-control @error('employee_id') is-invalid @enderror">
                                    <option value="">Select an employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('employee_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Check In</label>
                                <input type="date" class="form-control datetime @error('check_in') is-invalid @enderror" value="{{ @old('check_in') }}" name="check_in" required>
                                @error('check_in')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Check Out</label>
                                <input type="date" class="form-control datetime @error('check_out') is-invalid @enderror" value="{{ @old('check_out') }}" name="check_out" required>
                                @error('check_out')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control date @error('date') is-invalid @enderror" value="{{ @old('date') }}" name="date" required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mb-2">
                                <label class="form-label">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="present">Present</option>
                                    <option value="leave">Leave</option>
                                    <option value="Absent">Absent</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary btn-sm">Submit Presence</button>
                            <a href="{{ route('presences.index') }}" class="btn btn-secondary btn-sm">Back to List</a>
                        </form>
                    @else 
                        <form method="POST" action="{{ route('presences.store') }}">
                             @csrf

                             <div class="mb-3">
                                <b>Note</b> : Mohon ijinkan akses lokasi, supaya presences diterima 
                             </div> 

                            <div class="mb-3">
                                <label class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" required>
                            </div>

                            <div class="mb-3">
                                <iframe width="370" height="220" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="">

                                </iframe>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm" id="btn-present">
                                <i class="fas fa-check-circle"></i> Present
                            </button>

                        </form>
                    @endif

                </div>
            </div>

        </section>
    </div>

    <script>
        const iframe = document.querySelector('iframe');

        {{--  const officeLat = -6.3801635;  --}}
        const officeLat = -6.3647206405430765;
        {{--  const officeLon = 106.8879783;  --}}
        const officeLon = 106.87168952637727;
        const threshold = 0.01;

        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            {{--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31721.812348140516!2d106.87168952637727!3d-6.3647206405430765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ecc44a6e9259%3A0x3e4e6f976ed54731!2sIbnu%20Hajar%20Boarding%20School!5e0!3m2!1sid!2sid!4v1770785769080!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>  --}}
            iframe.src = `https://www.google.com/maps?q=${lat},${lon}&output=embed`; 
        });

        document.addEventListener('DOMContentLoaded', (event) => {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lon;

                    {{--  Compare lokasi sekarang dengan lokasi kantor  --}}
                    const distance = Math.sqrt(Math.pow(lat - officeLat, 2) + Math.pow(lon - officeLon, 2));
                    
                    if (distance <= threshold) {
                        {{--  posisi ada di sekitar kantor  --}}
                        alert('Anda berada di kantor, selamat bekerja');
                        document.getElementById('btn-present').removeAttribute('disabled');
                    } else {
                        {{--  posisi di luar kantor  --}}
                        alert('Anda berada di luar kantor, pastikan kamu berada di sekitar kantor untuk melakukan presensi');
                    }

                });
            }
        });
        
    </script>
    
@endsection