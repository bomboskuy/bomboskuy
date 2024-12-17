<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bomboskuy | Struk </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/barfiller.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" type="text/css">
    <link rel="icon" href="assets/images/178245364.jpeg" type="image/x-icon">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/barfiller.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" type="text/css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            color: #333;
        }
    
        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: all 0.3s ease;
        }
    
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
        }
    
        p {
            font-size: 14px;
            line-height: 1.5;
            margin: 10px 0;
        }
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
    
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }
    
        th {
            background-color: #f8f8f8;
            font-weight: bold;
            color: #2c3e50;
        }
    
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #27ae60;
            margin-top: 20px;
            text-align: right;
        }
    
        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
            font-size: 14px;
        }
    
        .print-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
    
        .print-button:hover {
            background-color: #2980b9;
        }
    
        /* Media Query untuk Tampilan Mobile */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
                box-shadow: none;
            }
    
            h1 {
                font-size: 20px;
            }
    
            p, th, td {
                font-size: 12px;
            }
    
            table {
                display: block;
                overflow-x: auto; /* Scroll horizontal jika tabel terlalu lebar */
            }
    
            .total {
                font-size: 16px;
                text-align: center;
            }
    
            .footer {
                font-size: 12px;
            }
    
            .print-button {
                font-size: 12px;
                padding: 8px 16px;
            }
        }
    </style>
    
</head>
<body>

    <div class="back-btn-container">
        <button onclick="window.location.href= '/'" class="back-btn"> 
            &#8592; <!-- Unicode panah kiri -->
        </button>
    </div>
    
    <div class="container">
        <h1>Struk Pembayaran</h1>
        <p><strong>ID Struk:</strong> {{ $order->id }}</p>
        <p><strong>Waktu Pembayaran:</strong> {{ $order->created_at }}</p>
        <p><strong>Nama Pembeli:</strong> {{ $order->name }}</p>
        <p><strong>Nomor Telepon:</strong> {{ $order->phone }}</p>

        <h3>Detail Produk</h3>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Harga Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $produk = App\Models\Produk::find($order->productID);
                @endphp
                <tr>
                    <td>{{ $produk->namaProduk }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="total">
            Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}
        </div>

        <div class="footer">
            <p>Silahkan Ambil Pesanan Anda Di Kasir dan Tunjukkan Struk ini</p>
            <a href="javascript:void(0)" class="print-button" id="printButton">Cetak Struk</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const printButton = document.getElementById('printButton');
            const container = document.querySelector('.container');

            printButton.addEventListener('click', function() {
                // Animasi sebelum mencetak
                container.style.transform = 'scale(0.95)';
                container.style.opacity = '0.8';
                setTimeout(function() {
                    container.style.transform = 'scale(1)';
                    container.style.opacity = '1';
                    window.print();
                }, 300);
            });

            // Animasi hover untuk baris tabel
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transition = 'background-color 0.3s ease';
                    this.style.backgroundColor = '#e8f4fc';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '';
                });
            });
        });
    </script>
</body>
</html>