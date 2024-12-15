@extends('dashboard.layouts.main')

@section('title', 'Setting Menu')

@section('content')
<div class="container mt-4">
    <h2>Daftar Pengaturan Menu</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('dashboard.setting_menus.create') }}" class="btn btn-primary">Tambah Pengaturan Menu</a>
    </div>

    <table id="settingMenuTable" class="table table-striped table-bordered">
        <thead class="thead-dark text-center">
            <tr>
                <th>#</th>
                <th>Role</th>
                <th>Menu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settingMenus as $key => $setting)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $setting->role->namaRole }}</td>
                    <td>{{ $setting->menu->name ?? 'Tidak ada menu' }}</td>
                    <td>
                        <a href="{{ route('dashboard.setting_menus.edit', $setting->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('dashboard.setting_menus.destroy', $setting->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
    <!-- DataTables -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#settingMenuTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
@endpush