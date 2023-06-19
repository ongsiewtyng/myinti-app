<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MyINTI')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/kopi-senja-sans">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/solid.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    

    <style>
        .navbar-brand {
            margin: 0;
            padding: 0;
            font-family: 'Kopi Senja Sans', sans-serif;
            font-size: 50px;
        }

        .navbar-nav.me-auto {
            margin-left: 20px;
        }

        .cart-button {
            position: relative;
            border: none;
            background-color: transparent;
            cursor: pointer;
            margin-top: 4px;
        }

        .cart-button ion-icon {
            font-size: 30px;
            color: #000;
        }

        .cart-counter {
            position: absolute;
            top: -2px;
            right: -5px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            background-color: #FF4141;
            color: #FFF;
            font-size: 12px;
            font-weight: bold;
            border-radius: 50%;
        }

        .links {
            color: #5a5a5a;
            text-decoration: none;
        }

        .height {
            height: 60px;
        }
    </style>

    @yield('styles')
    @yield('scripts')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex justify-content-center" href="{{ url('/') }}" style="font-size: 40px; color: #FF4141;">MyINTI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link links">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle links" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('service1') }}">Event Approval</a>
                                <a class="dropdown-item" href="{{ route('service2') }}">Tapau! Food</a>
                                <a class="dropdown-item" href="{{ route('service3') }}">Facility Reservation</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link links">Contact</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            <!-- Place your guest links here -->
                        @else
                            <li class="nav-item">
                                <a href="{{ url('/cart') }}" class="nav-link links">
                                    <button class="cart-button" type="button" id="cart-button">
                                        <ion-icon class="cart-button" name="cart-outline"></ion-icon>
                                        <span class="cart-counter">0</span>
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->pic)
                                        <img src="{{ asset('uploads/users/'. Auth::user()->pic) }}" style="width: 50px; height: 50px; border-radius: 50%;">
                                    @else
                                        <img src="{{ asset('pic.png')}}" style="width: 50px; height: 50px; border-radius: 50%;">
                                    @endif
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('order.history') }}">Order History</a>
                                    <a class="dropdown-item" href="{{ route('menus.edit-profile',['id' => Auth::id()]) }}" method="POST">Edit Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="overflow: hidden;">
            @yield('content')
        </main>
    </div>
    
    @yield('scripts')
    <script>
        // Function to update the cart counter
        function updateCartCounter(counter) {
            const cartCounter = document.querySelector('.cart-counter');
            cartCounter.textContent = counter.toString();
        }

        // Fetch the cart count from the server
        function fetchCartCount() {
            fetch('{{ route("cart.count") }}')
                .then(response => response.json())
                .then(data => {
                    updateCartCounter(data.count);
                })
                .catch(error => {
                    console.log(error);
                });
        }

        // Call fetchCartCount initially to get the current count
        fetchCartCount();
    </script>
</body>
</html>
