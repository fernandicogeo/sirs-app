@extends('layout')

@section('title', 'Home')

@section('content')
<div class="row d-flex justify-content-center text-center mt-5">
    <h1>Doctor Appointment</h1>
    <div class="col-lg-6">
        <form class="mb-5 mt-5" action="{{ route('add.appointment') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="patient_id" class="form-label @error('patient_id') is-invalid @enderror">Nama</label>
                <input type="text" class="form-control" id="patient_id" name="patient_id" required>
                @error('patient_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="doctor_id" class="form-label @error('doctor_id') is-invalid @enderror">Pilih Dokter</label>
                <select class="form-control @error('doctor_id') is-invalid @enderror" id="doctor_id" name="doctor_id" required>
                    <option value="" disabled selected>Pilih Dokter</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
                @error('doctor_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="schedule" class="form-label @error('schedule') is-invalid @enderror">Schedule</label>
                <input type="datetime-local" class="form-control" id="schedule" name="schedule" required>
                @error('schedule')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #2B4A9D;">Submit</button>
        </form>
    </div>
</div>
@endsection