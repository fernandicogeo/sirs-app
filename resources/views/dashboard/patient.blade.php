@extends('dashboard.layout')

@section('title', 'Pasien')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pasien</h1>
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
        {{-- ADD --}}
        
        @if ($type == 1)
        <a class="btn btn mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-file-earmark-plus-fill" style="color: #198754" title="Add"></i>
        </a>
        @endif

        <div class="row">
          <div style="overflow-x:auto;">
            <table class="table table-striped table-secondary">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Diagnosis</th>
                    <th scope="col">Deskripsi Diagnosis</th>
                    @if ($type == 1)
                        <th scope="col">Aksi</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <th scope="row">{{ $patient->id }}</th>
                        <td>{{ $patient->id_patient }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->sex }}</td>
                        <td>{{ $patient->diagnoses }}</td>
                        <td>{{ $patient->descOfDiagnoses }}</td>
                        @if ($type == 1)
                        <td>
                            {{-- EDIT --}}
                            <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-patient="{{ json_encode($patient) }}">
                              <i class="bi bi-pen-fill" style="color: #F0AD4E" title="Edit"></i>
                            </button>
                            {{-- DELETE --}}
                            <form action="{{ route('delete.patient', $patient->id) }}" method="post" class="d-inline">
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

  {{-- MODAL ADD --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pasien</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.patient') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id') }}" required>
                        @error('id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="id_patient" class="form-label">ID Pasien</label>
                        <input type="text" class="form-control @error('id_patient') is-invalid @enderror" id="id_patient" name="id_patient" value="{{ old('id_patient') }}" required>
                        @error('id_patient')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Umur</label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age') }}" required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sex" class="form-label">Jenis Kelamin</label>
                        <select class="form-control @error('sex') is-invalid @enderror" id="sex" name="sex" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="M">Laki-Laki</option>
                            <option value="F">Perempuan</option>
                        </select>
                        @error('sex')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="diagnoses" class="form-label">Diagnosis</label>
                        <input type="text" class="form-control @error('diagnoses') is-invalid @enderror" id="diagnoses" name="diagnoses" value="{{ old('diagnoses') }}" required>
                        @error('diagnoses')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descOfDiagnoses" class="form-label">Deskripsi Diagnosis</label>
                        <textarea class="form-control @error('descOfDiagnoses') is-invalid @enderror" id="descOfDiagnoses" name="descOfDiagnoses" required>{{ old('descOfDiagnoses') }}</textarea>
                        @error('descOfDiagnoses')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  {{-- MODAL EDIT --}}
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Pasien</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('edit.patient') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="edit_id" class="form-label">ID</label>
                        <input type="text" class="form-control @error('id') is-invalid @enderror" id="edit_id" name="id" readonly required>
                        @error('id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_id_patient" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('id_patient') is-invalid @enderror" id="edit_id_patient" name="id_patient" required>
                        @error('id_patient')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_age" class="form-label">Umur</label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="edit_age" name="age" required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_sex" class="form-label">Jenis Kelamin</label>
                        <select class="form-control @error('sex') is-invalid @enderror" id="edit_sex" name="sex" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="M">Laki-Laki</option>
                            <option value="F">Perempuan</option>
                        </select>
                        @error('sex')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_diagnoses" class="form-label">Diagnosis</label>
                        <input type="text" class="form-control @error('diagnoses') is-invalid @enderror" id="edit_diagnoses" name="diagnoses" required>
                        @error('diagnoses')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="edit_descOfDiagnoses" class="form-label">Deskripsi Diagnosis</label>
                        <textarea class="form-control @error('descOfDiagnoses') is-invalid @enderror" id="edit_descOfDiagnoses" name="descOfDiagnoses" required></textarea>
                        @error('descOfDiagnoses')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
            var patient = button.getAttribute('data-bs-patient');

            var patientData = JSON.parse(patient);
            
            document.getElementById('edit_id').value = patientData.id;
            document.getElementById('edit_id_patient').value = patientData.id_patient;
            document.getElementById('edit_age').value = patientData.age;
            document.getElementById('edit_sex').value = patientData.sex;
            document.getElementById('edit_diagnoses').value = patientData.diagnoses;
            document.getElementById('edit_descOfDiagnoses').value = patientData.descOfDiagnoses;
        });
    });
  </script>

@endsection