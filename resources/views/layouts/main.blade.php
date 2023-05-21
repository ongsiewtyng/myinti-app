<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MyINTI')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/kopi-senja-sans">
 
    @yield('styles')
    @yield('scripts')
    

    <style>
        @import url('https://fonts.cdnfonts.com/css/kopi-senja-sans');
        .navbar-brand{
            margin:0;
            padding:0;
            font-family: 'Kopi Senja Sans', sans-serif;
            font-size:50px;
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

        .links{
            color: #000000;
            text-decoration: none;
        }
        .height{
            height: 60px;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-size:40px; color:#FF4141;">
                    MyINTI
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link links">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle links" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
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

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            <!--@if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href
                                    ="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif-->
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
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('menus.edit-profile',['id' => Auth::id()]) }}" method="POST">
                                    {{ __('Edit Profile') }}
                                </a>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="overflow:hidden">
        @yield('content')
    </main>
</div>
</body>
</html>