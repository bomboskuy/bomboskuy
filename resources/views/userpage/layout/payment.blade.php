<h3>Detail Pesanan</h3>

<p><strong>Nama:</strong> {{ $order->name }}</p>
<p><strong>No. Telepon:</strong> {{ $order->phone }}</p>

<h4>Produk yang Dipesan:</h4>
<table>
    <tr>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>
    @foreach($order->produk as $product)
        <tr>
            <td>{{ $product->namaProduk }}</td>
            <td>Rp {{ number_format($product->pivot->price, 0, ',', '.') }}</td>
            <td>{{ $product->pivot->quantity }}</td>
            <td>Rp {{ number_format($product->pivot->price * $product->pivot->quantity, 0, ',', '.') }}</td>
        </tr>
    @endforeach
</table>
