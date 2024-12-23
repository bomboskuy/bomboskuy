<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> | Bomboskuy</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="icon" href="assets/images/178245364.jpeg" type="image/x-icon">

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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    @include('userpage.layout.navbar')
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->

    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="{{ asset('asset/img/hero/hero-2.jpg')}}">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Making your life sweeter one bite at a time!</h2>
                                <a href="#" class="primary-btn">Our cakes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
       
        <div id="about" class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span>About Bomboskuy shop</span>
                            <h2>Bomboskuy, Roti Bomboloni dari Dapur Penuh Cita Rasa!!</h2>
                        </div>
                        <p>Toko Roti Bomboloni menyajikan roti bomboloni dengan beragam varian rasa yang lezat dan menggugah selera. Setiap roti dibuat dengan bahan berkualitas tinggi dan diproses dengan penuh perhatian untuk menghasilkan rasa yang lembut dan empuk. Nikmati pilihan rasa klasik seperti Cokelat, Vanilla, dan Karamel, hingga rasa inovatif seperti Matcha dan Keju Asin. Kami berkomitmen untuk memberikan pengalaman rasa yang memuaskan di setiap gigitan!.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="about__bar">
                        <div class="about__bar__item">
                            <p>Tiramisu</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="95"></span>
                            </div>
                        </div>
                        <div class="about__bar__item">
                            <p>Matcha</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="80"></span>
                            </div>
                        </div>
                        <div class="about__bar__item">
                            <p>Keju</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="90"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Categories Section Begin -->
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-029-cupcake-3"></span>
                            <h5>Sweet Flavors</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-034-chocolate-roll"></span>
                            <h5>Krim Lembut</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-005-pancake"></span>
                            <h5>Special Flavors</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-030-cupcake-2"></span>
                            <h5>Buah</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Kombinasi Unik</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Sweet Flavors</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
    <div id="shop" class="container">
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


    <!-- Product Section End -->

    <!-- Team Section Begin -->
    <section class="team spad">
    <div id="team" class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="section-title">
                        <span>Our team</span>
                        <h2>Bomboskuy </h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="team__btn">
                        <a href="#" class="primary-btn">Join Us</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="{{ asset('asset/img/team/team-5.jpg')}}">
                        <div class="team__item__text">
                            <h6>Faza ulul ilma</h6>
                            <span>434231030</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/fzlmzaa" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="{{ asset('asset/img/team/team-7.jpg')}}">
                        <div class="team__item__text">
                            <h6>Ahlul Mufi</h6>
                            <span>434231078</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/ahlulmff_"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="{{ asset('asset/img/team/team-6.jpg')}}">
                        <div class="team__item__text">
                            <h6>Akbar Zahron</h6>
                            <span>434231028</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/akbarzjy_"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial spad">
    <div id="review" class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Testimonial</span>
                        <h2>Our client say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="{{ asset('asset/img/testimonial/ta-1.jpg')}}" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Kerry D.Silva</h5>
                                    <span>New york</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star-half_alt"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua viverra lacus vel facilisis.</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Follow us on instagram</span>
                            <h2>Sweet moments are saved as memories.</h2>
                        </div>
                        <h5><i class="fa fa-instagram"></i> @sweetcake</h5>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="{{ asset('asset/img/instagram/instagram-1.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="{{ asset('asset/img/instagram/instagram-2.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="{{ asset('asset/img/instagram/instagram-3.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="{{ asset('asset/img/instagram/instagram-4.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="{{ asset('asset/img/instagram/instagram-5.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="{{ asset('asset/img/instagram/instagram-3.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Map Begin -->
    <div class="map">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-7">
                    <div class="map__inner">
                        <h6>Indonesia</h6>
                        <ul>
                            <li>Jl. Airlangga No.4 - 6, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60115, Indonesia</li>
                            <li>Bomboskuy.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="map__iframe">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15830.873003480887!2d112.7572095211792!3d-7.272867290581779!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1734469692938!5m2!1sid!2sid" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <!-- Map End -->

    <!-- Footer Section Begin -->
    @include('userpage.layout.footer')
</footer>
<!-- Footer Section End -->

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
<script>
    $(document).ready(function() {
        $('.add-to-cart').on('click', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            
            // Kirim permintaan ke server untuk menambah item ke keranjang
            $.get(url, function(response) {
                alert('Produk berhasil ditambahkan ke keranjang!');
                // Update jumlah item di header
                $('#cart-count').text(response.cartCount);
                $('#cart-total').text(response.cartTotal);
            });
        });
    });
</script>
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