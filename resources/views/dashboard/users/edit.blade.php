<!-- resources/views/dashboard/users/edit.blade.php -->

@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h1>Ubah Pengguna</h1>
        
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

        <form action="{{ route('dashboard.users.update', $user->idUser) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="namaUser">Nama Pengguna</label>
                <input type="text" name="namaUser" id="namaUser" class="form-control" value="{{ old('namaUser', $user->namaUser) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="roleID">Role</label>
                <select name="roleID" id="roleID" class="form-control" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->roleID }}" {{ old('roleID', $user->roleID) == $role->roleID ? 'selected' : '' }}>{{ $role->namaRole }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Perbarui Pengguna</button>
        </form>
    </div>
@endsection
