@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Role</h2>

    <form action="{{ route('dashboard.roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="namaRole">Role Name</label>
            <input type="text" id="namaRole" name="namaRole" class="form-control" value="{{ old('namaRole') }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create Role</button>
    </form>
</div>
@endsection