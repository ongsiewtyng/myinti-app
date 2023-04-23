<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MyINTI ADMIN')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.cdnfonts.com/css/kopi-senja-sans">
 
    @yield('styles')
    @yield('scripts')
    

    <style>
        @import url('https://fonts.cdnfonts.com/css/kopi-senja-sans');
        body {
        margin: 0;
        padding: 0;
        }

        .navbar-brand {
        font-family: 'Kopi Senja Sans';
        padding:10px;
        }

        .p{
            margin-top: -15px;
            margin-bottom: 2rem;
        }

        .sidenav {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
        
        }

        .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        }

        .sidenav a:hover {
        color: #f1f1f1;
        }

        .openbtn{
            position: absolute;
            top: 23px;
            left: 190px;
            font-size: 30px;
            font-weight: 600;
            background-color: transparent;
            color: white;
            border: none;
        }
        /* Close button styles */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .main {
        margin-left: 200px; /* Same as the width of the sidenav */
        padding: 0 20px;
        transition: 0.5s;
        }

        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }

    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="sidenav" id="sidenav">
        <button class="openbtn">
            <ion-icon name="close-outline" onclick="closeNav()" id= "close-toggle"></ion-icon>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}" style="font-size:30px;">
            MyINTI <p>ADMIN</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
        </button>
        <section id="sidebar">
            <ul class="side-menu top">
                <li class="active">
                    <a href="#">
                        <ion-icon name="log-in-outline"></ion-icon>
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <span class="text">Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="stats-chart-outline"></ion-icon>
                        <span class="text">Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                        <span class="text">Message</span>
                    </a>
                </li>
            </ul>
            <ul class="side-menu">
                <li>
                <a href="#">
                    <ion-icon name="cog-outline"></ion-icon>
                    <span class="text">Settings</span>
                </a>
                </li>
                <li>
                <a href="{{ route('admin') }}" class="logout">
                <ion-icon name="log-in-outline"></ion-icon>
                    <span class="text">Logout</span>
                </a>
                </li>
            </ul>
            </section>
    </div>

    <script>
        function closeNav() {
            var closeIcon = document.querySelector("#close-toggle[name='close-outline']");
            var openIcon = document.querySelector("#close-toggle[name='menu-outline']");
            var sidenav = document.getElementById("sidenav");
            
            if (closeIcon) {
                // close the sidebar and show the appropriate icons
                sidenav.style.width = "80px";
                closeIcon.setAttribute("name", "menu-outline");
                openIcon.setAttribute("name", "close-outline");
            } else {
                openIcon.setAttribute("name", "menu-outline");
            }
        }

    
    </script>           
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>




    

