@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    <form action="{{ route('dashboard.users.update', $user->idUser) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="namaUser">Name</label>
            <input type="text" name="namaUser" class="form-control" value="{{ old('namaUser', $user->namaUser) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <label for="roleID">Role</label>
            <select name="roleID" class="form-control" required>
                @foreach($roles as $role)
                    <option value="{{ $role->roleID }}" {{ $user->roleID == $role->roleID ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection