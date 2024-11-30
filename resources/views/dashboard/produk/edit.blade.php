@extends('dashboard.layouts.main')

@section('content')
    <div class="container mt-4">
        <h1>Edit Produk</h1>

        <form action="{{ route('dashboard.produk.update', $produk->productID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div class="form-group">
                <label for="namaProduk">Nama Produk:</label>
                <input type="text" name="namaProduk" id="namaProduk" class="form-control" value="{{ $produk->namaProduk }}" required>
            </div>

            <!-- Harga -->
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ $produk->harga }}" required>
            </div>

            <!-- Stok -->
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" name="stok" id="stok" class="form-control" value="{{ $produk->stok }}" required>
            </div>

            <!-- Foto -->
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control">
                @if($produk->foto)
                    <div class="mt-3">
                        <strong>Foto Produk:</strong>
                        <br>
                        <img src="{{ asset('storage/' . $produk->foto) }}" width="100" class="img-thumbnail" alt="{{ $produk->namaProduk }}">
                    </div>
                @endif
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('dashboard.produk.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection