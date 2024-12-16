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
</head>

<body>
    <!-- Header -->
    <header class="cart-header">
        <div class="container">
            <div class="header-content">
                <div class="back-btn-container">
                    <button onclick="window.history.back();" class="back-btn">
                        &#8592; <!-- Unicode panah kiri -->
                    </button>
                </div>
                <div class="logo">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" class="logo-img">
                </div>
                <div class="search-bar">
                    <input type="text" id="search-input" class="search-input" placeholder="Cari produk..." onkeyup="searchProducts()">
                </div>
            </div>
        </div>
    </header>

    <!-- Cart Section -->
    <div class="cart-container">
         <!-- Tampilkan pesan berhasil -->
         @if(session('success'))
    <div id="success-popup" class="popup">
        <div class="popup-content">
            <button onclick="closeSuccessPopup()" class="popup-close-btn">&times;</button>
                        <div class="checkmark-container">
                <div class="checkmark-circle">
                    <div class="checkmark-stem"></div>
                    <div class="checkmark-kick"></div>
                </div>
            </div>
            <h3>Berhasil!</h3>
            <p>{{ session('success') }}</p>
            <a href="#" class="btn btn-primary">Lanjutkan ke Pembayaran</a>
        </div>
    </div>
    @endif

        @if(session()->has('cart') && count(session('cart')) > 0)
            <ul class="cart-items" id="cart-items">
                @foreach($cart as $index => $item)
                    <li class="cart-item">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-image">
                        <div class="cart-item-details">
                            <span class="cart-item-name">{{ $item['name'] }}</span>
                            <span class="cart-item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                        </div>
                        <div class="quantity-controls">
                            <button class="qty-btn" onclick="updateQuantity({{ $index }}, -1)">-</button>
                            <span class="cart-item-quantity" id="quantity-{{ $index }}">{{ $item['quantity'] }}</span>
                            <button class="qty-btn" onclick="updateQuantity({{ $index }}, 1)">+</button>
                        </div>
                        <a href="{{ route('cart.remove', $index) }}" class="remove-item">Remove</a>
                    </li>
                @endforeach
            </ul>

            <div class="cart-total">
                <div class="total-left">
                    <strong>Total:</strong>
                    <span id="cart-total">Rp {{ number_format($cartTotal, 0, ',', '.') }}</span>
                </div>
                <div class="checkout-container">
                    <button onclick="openCheckoutPopup()" class="checkout-btn">Checkout</button>
                </div>
            </div>
        @else
            <p>Keranjang Anda kosong!</p>
        @endif
    </div>

   <!-- Checkout Popup -->
<div id="checkout-popup" class="popup">
    <div class="popup-content">
        <button onclick="closeCheckoutPopup()" class="popup-close-btn">&times;</button>
        <h3 class="popup-title">Checkout</h3>

        <form action="{{ route('order.create') }}" method="POST">
            @csrf
            
            <!-- Nama Lengkap -->
            <div class="form-group">
                <label for="name">Nama Lengkap:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            
            <!-- Nomor Telepon -->
            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            
            <!-- Produk yang Dipesan -->
            <div class="form-group">
                <h4>Produk yang Dipesan:</h4>
                @foreach(session('cart') as $productId => $item)
                    <input type="hidden" name="product_id[]" value="{{ $productId }}">
                    <p>{{ $item['name'] }} (Rp {{ number_format($item['price'], 0, ',', '.') }})</p>
                @endforeach
            </div>

            <!-- Tombol Submit -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Order</button>
            </div>
        </form>
    </div>
</div>


    <!-- Js Plugins -->
    <script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('asset/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/js/slicknav.min.js') }}"></script>
    <script src="{{ asset('asset/js/main.js') }}"></script>

    <script>
        // Update Cart Quantity
        function updateQuantity(index, change) {
            $.ajax({
                url: "{{ url('cart/update') }}/" + index + "/" + change,
                method: "GET",
                success: function(response) {
                    $('#quantity-' + index).text(response.quantity);
                    $('#cart-total').text('Rp ' + response.totalPrice);
                },
                error: function(error) {
                    alert('Terjadi kesalahan saat memperbarui kuantitas.');
                }
            });
        }

        // Product Search
        function searchProducts() {
            const query = document.getElementById('search-input').value.toLowerCase();
            const items = document.querySelectorAll('.cart-item');

            items.forEach(item => {
                const productName = item.querySelector('.cart-item-name').textContent.toLowerCase();
                if (productName.includes(query)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Popup Functions
        function openCheckoutPopup() {
            document.getElementById("checkout-popup").style.display = "block";
        }

        function closeCheckoutPopup() {
            document.getElementById("checkout-popup").style.display = "none";
        }
    </script>

    
<script>
function openCheckoutPopup() {
    document.getElementById('checkout-popup').style.display = 'flex'; /* Tampilkan popup */
}

function closeCheckoutPopup() {
    document.getElementById('checkout-popup').style.display = 'none'; /* Sembunyikan popup */
}
</script>
<script>
        document.getElementById('success-popup').style.display = 'flex';
        function closeSuccessPopup() {
            document.getElementById('success-popup').style.display = 'none';
        }
    </script>
    

<script>
document.addEventListener('DOMContentLoaded', () => {
    const popup = document.getElementById('success-popup');
    if (popup) {
        popup.style.display = 'flex';
        setTimeout(() => {
            const checkmarkCircle = document.querySelector('.checkmark-circle');
            checkmarkCircle.classList.add('animate');
        }, 200); // Delay sedikit untuk memberikan efek
    }
});
</script>



    <style>
        /* Header Section */
        .cart-header {
            background-color: #f08632;
            padding: 20px 0;
            text-align: center;
            color: #fff;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-btn-container {
            margin-right: 20px; /* Spacing between back button and logo */
        }

        .back-btn {
            background: none;
            border: none;
            font-size: 24px;
            color: white;
            cursor: pointer;
        }

        .logo-img {
            width: 120px;
        }

        .search-bar input {
            padding: 10px;
            width: 300px;
            border: none;
            border-radius: 25px;
            outline: none;
            font-size: 16px;
        }

        /* Cart Section */
        .cart-container {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .cart-items {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            justify-content: space-between;
        }

        .cart-item img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-item-details {
            margin-left: 15px;
            flex-grow: 1;
        }

        .cart-item-name {
            font-weight: bold;
            font-size: 16px;
        }

        .cart-item-price {
            font-size: 14px;
            color: #666;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }

        .qty-btn {
            background-color: #f08632;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .remove-item {
            color: red;
            font-size: 14px;
            text-decoration: none;
        }

        .cart-total {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-left {
            font-weight: bold;
            font-size: 18px;
        }

        .checkout-btn {
            background-color: #f08632;
            padding: 10px 20px;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        /* Checkout Popup */
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }

        .popup-close-btn {
            background-color: transparent;
            border: none;
            font-size: 24px;
            color: #000;
            cursor: pointer;
            float: right;
        }

/* Popup Overlay */
.popup {
    display: none; /* Awalnya tersembunyi */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Latar belakang gelap */
    z-index: 9999;
    justify-content: center;
    align-items: center;
}

/* Popup Content */
.popup-content {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    max-width: 500px;
    width: 90%; /* Responsif */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    position: relative;
}

/* Popup Title */
.popup-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #333;
}

/* Close Button */
.popup-close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: #333;
}

/* Form Styling */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

/* Button */
.btn-primary {
    background-color: #f08632;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #d97d2b;
}

/* Responsive Design */
@media (max-width: 768px) {
    .popup-content {
        padding: 15px;
        max-width: 90%;
    }

    .popup-title {
        font-size: 20px;
    }

    .btn-primary {
        font-size: 14px;
        padding: 8px 16px;
    }
}

/* Styling Checkmark */
/* Styling Checkmark */
.checkmark-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.checkmark-circle {
    width: 80px;
    height: 80px;
    border: 4px solid #FFA500; /* Warna oranye */
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    animation: pop 0.3s ease-out;
    background-color: #fff; /* Warna latar */
}

.checkmark-stem {
    width: 5px;
    height: 30px;
    background-color: #FFA500; /* Warna oranye */
    position: absolute;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(45deg);
    transform-origin: bottom;
    animation: draw-stem 0.5s ease-out forwards;
}

.checkmark-kick {
    width: 5px;
    height: 15px;
    background-color: #FFA500; /* Warna oranye */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-45deg);
    transform-origin: bottom;
    animation: draw-kick 0.5s ease-out forwards;
}

/* Animasi Lingkaran */
@keyframes pop {
    from {
        transform: scale(0.5);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

/* Animasi Garis Checkmark */
@keyframes draw-stem {
    from {
        height: 0;
    }
    to {
        height: 30px;
    }
}

@keyframes draw-kick {
    from {
        height: 0;
    }
    to {
        height: 15px;
    }
}

    </style>
</body>
</html>
