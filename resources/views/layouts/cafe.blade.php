<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MyCafeteria')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/kopi-senja-sans">
 
    @yield('styles')
    @yield('scripts')
    

    <style>
        @import url('https://fonts.cdnfonts.com/css/kopi-senja-sans');
        .navbar-brand {
            margin: 0;
            padding: 0;
            font-family: 'Kopi Senja Sans', sans-serif;
            font-size: 50px;
        }

        .navbar-nav.me-auto {
            margin-left: 20px;
        }

        .links {
            color: #000000;
            text-decoration: none;
        }

        .height {
            height: 60px;
        }

        /* Back Button Styles */
        .back-button {
            font-size: 30px;
            margin-right: 5px;
            cursor:pointer;
        }

        /* Cart Button Styles */
        .cart-button {
            position: relative;
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: 30px;
        }

        .cart-counter {
            position: absolute;
            top: -10px;
            right: -10px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20px;
            height: 20px;
            background-color: red;
            color: white;
            font-size: 12px;
            border-radius: 50%;
        }
    </style>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Back Button Functionality
            document.getElementById('back-button').addEventListener('click', function() {
                // Add your logic to go back to the menu section
                window.location.href = '/service2';
             });

            // Cart Functionality
            var cartItems = JSON.parse(localStorage.getItem('cartItems')) || []; // Retrieve cart items from local storage or initialize it to an empty array
            var cartCounter = cartItems.length; // Get the cart counter based on the number of items

            // Display the cart counter
            document.querySelector('.cart-counter').textContent = cartCounter;

            // Get all the select buttons
            var selectButtons = document.querySelectorAll('.select-btn');

            // Add event listeners to each select button
            selectButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Add your logic to handle cart functionality
                    var foodName = button.getAttribute('name');
                    var unitPrice = button.getAttribute('price');
                    // var remarks = button.getAttribute('data-remarks');
                    addItemToCart(foodName, unitPrice, remarks);
                });
            });

            function addItemToCart(foodName, unitPrice, remarks) {
                var item = {
                    foodName: name,
                    unitPrice: price,
                    remarks: remarks
                };

                cartItems.push(item);
                cartCounter++;
                document.querySelector('.cart-counter').textContent = cartCounter;
                localStorage.setItem('cartItems', JSON.stringify(cartItems)); // Store the updated cart items in local storage
                // Redirect to payment page with cart items as a parameter
                window.location.href = '/payment?cartItems=' + encodeURIComponent(JSON.stringify(cartItems));
            }
        });
    </script>


</head>
<body>
   <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Back Button -->
                <div class="back-button">
                    <ion-icon class="back-button" name="chevron-back-circle-outline" id="back-button"></ion-icon>   
                </div>

                <!-- Centered MyINTI -->
                <a class="navbar-brand mx-auto" href="{{ url('/service2') }}" style="font-size:40px; color:#FF4141;">
                    MyCafeteria
                </a>

                <!-- Cart Button with Counter -->
                <div class="cart-button-container">
                    <a href="{{ url('/cart') }}">
                        <button class="cart-button" type="button" id="cart-button">
                            <ion-icon class="cart-button" name="cart-outline"></ion-icon>
                            <span class="cart-counter">0</span>
                        </button>
                    </a>
                </div>
            </div>
        </nav>
    </div>


    <main class="py-4" style="overflow:hidden">
        @yield('content')
    </main>

</body>
</html>