@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h2>Daftar Menu</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('menu.create') }}" class="btn btn-primary">Add New Menu</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Menu Name</th>
                <th>URL</th>
                <th>Icon</th>
                <th>parent_id</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->url }}</td> <!-- Menampilkan URL -->
                    <td>{{ $menu->icon }}</td> <!-- Menampilkan Icon -->
                    <td>{{ $menu->parent_id ?? 'No Parent' }}</td> <!-- Menampilkan parent_id -->
                    <td>{{ $menu->sort_order }}</td>
                    <td>
                        <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline;">
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
