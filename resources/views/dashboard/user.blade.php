@extends('dashboard.layout')

@section('title', 'User')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
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
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->type == 1)
                                    Admin
                                @elseif ($user->type == 2)
                                    Dokter
                                @else
                                    Pasien
                                @endif

                            </td>
                            <td>
                                {{-- EDIT --}}
                                <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-user="{{ json_encode($user) }}">
                                    <i class="bi bi-pen-fill" style="color: #F0AD4E" title="Edit"></i>
                                </button>
                                {{-- DELETE --}}
                                <form action="{{ route('delete.user', $user->id) }}" method="post" class="d-inline">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.user') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
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
                        <label for="type" class="form-label">Role</label>
                        <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Dokter</option>
                            <option value="3">Pasien</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
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
                <h1 class="modal-title fs-5" id="editModalLabel">Edit User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('edit.user') }}" method="post" enctype="multipart/form-data">
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
                        <label for="edit_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_type" class="form-label">Role</label>
                        <select class="form-control" id="edit_type" name="type" required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Dokter</option>
                            <option value="3">Pasien</option>
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
            var user = button.getAttribute('data-bs-user');

            var userData = JSON.parse(user);
            
            document.getElementById('edit_id').value = userData.id;
            document.getElementById('edit_name').value = userData.name;
            document.getElementById('edit_email').value = userData.email;
            document.getElementById('edit_type').value = userData.type;
        });
    });
</script>

@endsection