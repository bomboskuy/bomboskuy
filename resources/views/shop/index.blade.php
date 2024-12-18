<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

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
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="product spad">
    <div class="container">
    <div class="row mb-4">
            <div class="col-12">
                <form action="{{ route('shop.index') }}" method="GET">
                    <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request()->get('search') }}">
                </form>
            </div>
        </div>
        <div class="row">
            
            @foreach($produks as $produk)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                    <div class="product__item__pic">
                    <img src="{{ asset('storage/' . $produk->foto) }}" alt="Produk {{ $produk->namaProduk }}"
                    width="240" height="270">
                            <div class="product__label">
                                <span>{{ $produk->namaProduk }}</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{ $produk->namaProduk }}</a></h6>
                            <div class="product__item__price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</div>
                            <div class="cart_add">
                                <a href="{{ route('cart.add', $produk->productID) }}" class="add-to-cart">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
    <!-- Shop Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
<!-- Footer Section End -->
    <!-- Footer Section Begin -->
    @include('userpage.layout.footer')
</footer>

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

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