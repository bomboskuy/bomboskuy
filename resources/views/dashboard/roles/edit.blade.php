@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h2>Edit Role</h2>

    <form action="{{ route('dashboard.roles.update', $role->roleID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="namaRole">Role Name</label>
            <input type="text" id="namaRole" name="namaRole" class="form-control" value="{{ old('namaRole', $role->namaRole) }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update Role</button>
    </form>
</div>
@endsection