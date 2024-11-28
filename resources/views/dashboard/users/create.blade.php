<!-- resources/views/dashboard/users/create.blade.php -->

@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h1>Tambah Pengguna Baru</h1>
        
        <!-- Menampilkan Pesan Kesalahan -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dashboard.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="namaUser">Nama Pengguna</label>
                <input type="text" name="namaUser" id="namaUser" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="roleID">Role</label>
                <select name="roleID" id="roleID" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->roleID }}">{{ $role->namaRole }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan Pengguna</button>
        </form>
    </div>
@endsection