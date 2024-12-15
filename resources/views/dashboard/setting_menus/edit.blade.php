@extends('dashboard.layouts.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Pengaturan Menu</h2>

    @if ($settingMenu->isNotEmpty())
        <form action="{{ route('dashboard.setting_menus.update', $settingMenu[0]->role_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card p-4 shadow-sm">
                <!-- Role Dropdown -->
                <div class="form-group mb-3">
                    <label for="role_id" class="form-label">Role:</label>
                    <select name="role_id" class="form-select" id="role_id" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->roleID }}" {{ $role->roleID == $settingMenu[0]->role_id ? 'selected' : '' }}>
                                {{ $role->namaRole }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Menu Checkbox -->
                <div class="form-group mb-3">
                    <label for="menus" class="form-label">Menu:</label>
                    <div class="row">
                        @foreach ($menus as $menu)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="menu_id[]" value="{{ $menu->id }}" 
                                        id="menu_{{ $menu->id }}" {{ in_array($menu->id, $selectedMenus) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="menu_{{ $menu->id }}">{{ $menu->name }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('dashboard.setting_menus.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    @else
        <div class="alert alert-warning">Data pengaturan menu untuk role ini tidak ditemukan.</div>
    @endif
</div>
@endsection