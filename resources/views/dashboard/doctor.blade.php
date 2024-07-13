@extends('dashboard.layout')

@section('title', 'Dokter')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Dokter</h1>
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
        <a class="btn btn mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-file-earmark-plus-fill" style="color: #198754" title="Add"></i>
        </a>

        <div class="row">
            <div style="overflow-x:auto;">
                <table class="table table-striped table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Prefik</th>
                            <th scope="col">Alamat Klinik</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Email</th>
                            <th scope="col">Spesialisasi</th>
                            <th scope="col">Path Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                        <tr>
                            <th scope="row">{{ $doctor->id }}</th>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->name_pref }}</td>
                            <td>{{ $doctor->clinic_address }}</td>
                            <td>{{ $doctor->contact }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->specialty_ids }}</td>
                            <td>
                                <img src="{{ asset($doctor->img_path) }}" alt="Doctor Image" style="max-width: 100px;">
                            </td>
                            <td>
                                {{-- EDIT --}}
                                <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-doctor="{{ json_encode($doctor) }}">
                                    <i class="bi bi-pen-fill" style="color: #F0AD4E" title="Edit"></i>
                                </button>
                                {{-- DELETE --}}
                                <form action="{{ route('delete.doctor', $doctor->id) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn">
                                        <i class="bi bi-trash3-fill" style="color: #E04146" title="Hapus"></i>
                                    </button>
                                </form>
                            </td>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Dokter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.doctor') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name_pref" class="form-label">Nama Prefik</label>
                            <input type="text" class="form-control @error('name_pref') is-invalid @enderror" id="name_pref" name="name_pref" value="{{ old('name_pref') }}" required>
                            @error('name_pref')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="clinic_address" class="form-label">Alamat Klinik</label>
                            <input type="text" class="form-control @error('clinic_address') is-invalid @enderror" id="clinic_address" name="clinic_address" value="{{ old('clinic_address') }}" required>
                            @error('clinic_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Kontak</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}" required>
                            @error('contact')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="specialty_ids" class="form-label">Spesialisasi</label>
                            <input type="text" class="form-control @error('specialty_ids') is-invalid @enderror" id="specialty_ids" name="specialty_ids" value="{{ old('specialty_ids') }}" required>
                            @error('specialty_ids')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="img_path" class="form-label">Path Gambar</label>
                            <input type="file" class="form-control @error('img_path') is-invalid @enderror" id="img_path" name="img_path" required>
                            @error('img_path')
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
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Dokter</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('edit.doctor') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="edit_id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="edit_id" name="id" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="edit_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_name_pref" class="form-label">Nama Prefik</label>
                        <input type="text" class="form-control" id="edit_name_pref" name="name_pref" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_clinic_address" class="form-label">Alamat Klinik</label>
                        <input type="text" class="form-control" id="edit_clinic_address" name="clinic_address" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_contact" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="edit_contact" name="contact" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_specialty_ids" class="form-label">Spesialisasi</label>
                        <input type="text" class="form-control" id="edit_specialty_ids" name="specialty_ids" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_img_path" class="form-label">Path Gambar</label>
                        <input type="file" class="form-control" id="edit_img_path" name="img_path">
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
            var doctor = button.getAttribute('data-bs-doctor');

            var doctorData = JSON.parse(doctor);
            
            document.getElementById('edit_id').value = doctorData.id;
            document.getElementById('edit_name').value = doctorData.name;
            document.getElementById('edit_name_pref').value = doctorData.name_pref;
            document.getElementById('edit_clinic_address').value = doctorData.clinic_address;
            document.getElementById('edit_contact').value = doctorData.contact;
            document.getElementById('edit_email').value = doctorData.email;
            document.getElementById('edit_specialty_ids').value = doctorData.specialty_ids;
        });
    });
</script>

@endsection