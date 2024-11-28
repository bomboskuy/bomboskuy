@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h2>Add New User</h2>

    <form action="{{ route('dashboard.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="namaUser">Name</label>
            <input type="text" name="namaUser" class="form-control" value="{{ old('namaUser') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="roleID">Role</label>
            <select name="roleID" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->roleID }}" {{ old('roleID') == $role->roleID ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection