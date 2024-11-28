@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Role</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary">Add New Role</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Role Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->roleID }}</td>
                    <td>{{ $role->namaRole }}</td>
                    <td>
                        <a href="{{ route('dashboard.roles.edit', $role->roleID) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('dashboard.roles.destroy', $role->roleID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
