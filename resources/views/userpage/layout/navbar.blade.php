<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                <ul>
                                    <li><a href="{{ route('login') }}">Sign in</a> <span class="arrow_carrot-down"></span></li>
                                </ul>
                            </div>
                            <div class="header__logo">
                                <a href="https://www.instagram.com/bomboskuy/"><img src="{{ asset('asset/img/nobg.png')}}" alt="" width="90" height="90" ></a>
                            </div>
                            <div class="header__top__right">
                                    <div class="header__top__right__links">
                                        <a href="#" class="search-switch">
                                            <img src="{{ asset('asset/img/icon/search.png') }}" alt="" width="20" height="20">
                                        </a>
                                        <a href="#">
                                            <img src="{{ asset('asset/img/icon/heart.png') }}" alt="" width="20" height="20">
                                        </a>
                                    </div>
                                    <div class="header__top__right__cart">
                                        <a href="{{ route('cart.show') }}">
                                            <img src="{{ asset('asset/img/icon/cart.png') }}" alt="" width="20" height="20">
                                            <span>{{ count(session()->get('cart', [])) }}</span> <!-- Menampilkan jumlah item dalam keranjang -->
                                        </a>
                                        <div class="cart__price">
                                            Cart: 
                                            <span>
                                                Rp{{ number_format(session()->get('cart_total', 0), 2) }} <!-- Menampilkan total harga dari session -->
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#shop">Shop</a></li>
                            <li><a href="#team">Team</a></li>
                            <li><a href="#review">Review</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>