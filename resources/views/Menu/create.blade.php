@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h2>Add New Menu</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('menu.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Menu Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Icon</label>
            <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon') }}">
        </div>

        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Menu</label>
            <select class="form-select" id="parent_id" name="parent_id">
                <option value="">None</option>
                @foreach($menus as $parentMenu)
                    <option value="{{ $parentMenu->id }}" {{ old('parent_id') == $parentMenu->id ? 'selected' : '' }}>
                        {{ $parentMenu->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
        </div>

        <button type="submit" class="btn btn-primary">Add Menu</button>
    </form>
</div>
@endsection
