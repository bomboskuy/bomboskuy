@extends('dashboard.layouts.main')

@section('content')
    <div class="container mt-4">
        <h1>Tambah Produk</h1>

        <form action="{{ route('dashboard.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Produk -->
            <div class="form-group">
                <label for="namaProduk">Nama Produk:</label>
                <input type="text" name="namaProduk" id="namaProduk" class="form-control" required>
            </div>

            <!-- Harga -->
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-control" required>
            </div>

            <!-- Stok -->
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" name="stok" id="stok" class="form-control" required>
            </div>

            <!-- Foto -->
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control" required>
            </div>

            <!-- Tombol Simpan dan Kembali -->
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('dashboard.produk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection