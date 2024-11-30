@extends('dashboard.layouts.main')

@section('content')
    <div class="container mt-4">
        <h1>Daftar Produk</h1>
        <a href="{{ route('dashboard.produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead class="thead-light">
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $item)
                        <tr>
                            <td>{{ $item->namaProduk }}</td>
                            <td>{{ number_format($item->harga, 2) }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->foto) }}" class="img-thumbnail" width="100" alt="{{ $item->namaProduk }}">
                            </td>
                            <td>
                                <a href="{{ route('dashboard.produk.edit', $item->productID) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('dashboard.produk.destroy', $item->productID) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection