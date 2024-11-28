<!-- resources/views/dashboard/users/index.blade.php -->

@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h1>Daftar Pengguna</h1>
        <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary">Tambah Pengguna</a>

        <!-- Menampilkan Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->namaUser }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->namaRole }}</td> <!-- Menampilkan nama role -->
                        <td>
                            <a href="{{ route('dashboard.users.edit', $user->idUser) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('dashboard.users.destroy', $user->idUser) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection