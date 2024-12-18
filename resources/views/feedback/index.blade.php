<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/flaticon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/barfiller.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css')}}" type="text/css">
</head>

<body>

<div class="offcanvas-menu-overlay"></div>
@include('userpage.layout.navbar')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Riwayat Pesanan</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="./index.html">Home</a>
                    <span>Riwayat Pesanan</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Order History Section Begin -->
<section class="wishlist spad">
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ number_format($order->total_price, 2) }}</td>
                        <td>
                            @if($order->status == 'completed')
                                @if($order->feedback) <!-- Jika sudah ada feedback -->
                                    <button class="btn btn-success" disabled>Feedback Terkirim</button>
                                @else <!-- Jika belum ada feedback -->
                                    <a href="{{ route('feedback.create', $order->id) }}" class="btn btn-primary">Beri Feedback</a>
                                @endif
                            @else <!-- Jika status belum completed -->
                                <a href="#" class="btn btn-warning">Lanjutkan Pembayaran</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- Order History Section End -->

<!-- Footer Section Begin -->
<footer class="footer set-bg" data-setbg="{{ asset('asset/img/footer-bg.jpg') }}">
    @include('userpage.layout.footer')
</footer>

<!-- Js Plugins -->
<script src="{{ asset('asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('asset/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('asset/js/jquery.barfiller.js')}}"></script>
<script src="{{ asset('asset/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('asset/js/jquery.slicknav.js')}}"></script>
<script src="{{ asset('asset/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('asset/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{ asset('asset/js/main.js')}}"></script>

</body>

</html>
