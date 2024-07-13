@extends('dashboard.layout')

@section('title', 'Appointment')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Appointment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div style="overflow-x:auto;">
            <table class="table table-striped table-secondary">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Dokter</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Status</th>
                    @if ($type == 1)
                    <th scope="col">Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <th scope="row">{{ $appointment->id }}</th>
                        <td>{{ $appointment->patient_id }}</td>
                        <td>{{ $appointment->email }}</td>
                        <td>
                            @php
                            $doctor = $doctors->firstWhere('id', $appointment->doctor_id);
                            @endphp
                            {{ $doctor ? $doctor->name : 'Dokter tidak ditemukan' }}    
                        </td>
                        <td>{{ $appointment->schedule }}</td>
                        <td>
                            @php
                                $statusMap = [
                                    0 => 'Verification',
                                    1 => 'Confirmed',
                                    2 => 'Reschedule',
                                    3 => 'Done'
                                ];
                            @endphp
                            {{ $statusMap[$appointment->status] ?? 'Unknown' }}
                        </td>
                        @if ($type == 1)
                        <td>
                            {{-- EDIT --}}
                            <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-appointment="{{ json_encode($appointment) }}">
                              <i class="bi bi-pen-fill" style="color: #F0AD4E" title="Edit"></i>
                            </button>
                            {{-- DELETE --}}
                            <form action="{{ route('delete.appointment', $appointment->id) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn">
                                    <i class="bi bi-trash3-fill" style="color: #E04146" title="Hapus"></i>
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>

{{-- MODAL EDIT --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Appointment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('edit.appointment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="edit_id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="edit_id" name="id" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_patient_id" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" id="edit_patient_id" name="patient_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_doctor_id" class="form-label">Dokter</label>
                        <select class="form-control @error('doctor_id') is-invalid @enderror" id="edit_doctor_id" name="doctor_id" required>
                            <option value="" disabled selected>Pilih Dokter</option>
                            @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_schedule" class="form-label">Jadwal</label>
                        <input type="datetime-local" class="form-control" id="edit_schedule" name="schedule" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_status" class="form-label">Status</label>
                        <select class="form-select" id="edit_status" name="status" required>
                            <option value="0">Verification</option>
                            <option value="1">Confirmed</option>
                            <option value="2">Reschedule</option>
                            <option value="3">Done</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var appointment = button.getAttribute('data-bs-appointment');

            var appointmentData = JSON.parse(appointment);
            
            document.getElementById('edit_id').value = appointmentData.id;
            document.getElementById('edit_email').value = appointmentData.email;
            document.getElementById('edit_doctor_id').value = appointmentData.doctor_id;
            document.getElementById('edit_patient_id').value = appointmentData.patient_id;
            document.getElementById('edit_schedule').value = appointmentData.schedule;
            document.getElementById('edit_status').value = appointmentData.status;
        });
    });
</script>

@endsection