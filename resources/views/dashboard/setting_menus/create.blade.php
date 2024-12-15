@extends('dashboard.layouts.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Pengaturan Menu</h2>

    <form action="{{ route('dashboard.setting_menus.store') }}" method="POST">
        @csrf
        <div class="card p-4 shadow-sm">
            <!-- Role Dropdown -->
            <div class="form-group mb-3">
                <label for="role_id" class="form-label">Role:</label>
                <select name="role_id" class="form-select" id="role_id" required>
                    <option value="" disabled selected>Pilih Role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->roleID }}">{{ $role->namaRole }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Menu Checkbox -->
            <div class="form-group mb-3">
                <label for="menus" class="form-label">Pilih Menu:</label>
                <div class="row">
                    @foreach ($menus as $menu)
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="menu_id[]" value="{{ $menu->id }}" id="menu_{{ $menu->id }}">
                                <label class="form-check-label" for="menu_{{ $menu->id }}">{{ $menu->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('dashboard.setting_menus.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection