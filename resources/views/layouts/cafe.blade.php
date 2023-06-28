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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Add this script tag before your custom JavaScript code -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Add this script tag before the closing </body> tag of your HTML file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

 
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
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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

            function addItemToCart(foodName, unitPrice, foodId, userId) {
                // console.log('Adding item to cart:', foodName, unitPrice, foodId);
                            
                // Adjust the URL and data structure based on your backend implementation
                var url = '{{ route("cart.store") }}'; // Replace with the actual endpoint URL
                var data = {
                    food_id: foodId,
                    quantity: 1,
                    payment: 'Cash',
                    order_type:'Dine In',
                    user_id: userId,
                    _token: '{{ csrf_token() }}'
                };
                            
                // Perform an AJAX request to add the item to the cart
                axios.post(url, data)
                    .then(response => {
                        if (response.data.success) {
                            var cartCounterElement = document.querySelector('.cart-counter');
                            var cartCounter = parseInt(cartCounterElement.textContent);
                            cartCounter++;
                            cartCounterElement.textContent = cartCounter;
                            alert('Item added to cart successfully.');
                        } else {
                            alert('Error adding item to cart. Please try again.');
                        }
                    })
                    .catch(error => {
                        console.log(error);
                        alert('Error adding item to cart. Please try again.');
                    });
            }

            // Get all the select buttons
            var selectButtons = document.querySelectorAll('.select-btn');

            // Add event listeners to each select button
            selectButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Get the relevant attributes from the button
                    var foodName = button.getAttribute('name');
                    var unitPrice = button.getAttribute('price');
                    var foodId = button.getAttribute('id');
                    var userId = '{{ auth()->user()->id }}';

                    // Add the item to the cart
                    addItemToCart(foodName, unitPrice, foodId, userId);
                });
            });
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