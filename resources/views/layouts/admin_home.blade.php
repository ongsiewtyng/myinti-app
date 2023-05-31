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

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/solid.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Add this script tag before the closing </body> tag of your HTML file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
 
    @yield('styles')
    @yield('scripts')


    <style>
        /* Google Font Import - Poppins */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root{
            /* ===== Colors ===== */
            --body-color: #fafafa;
            --sidebar-color: #FFF;
            --primary-color: #68b4ff;
            --primary-color-light: #F6F5FF;
            --toggle-color: #DDD;
            --text-color: #707070;
            --box1-color: #D6EAF8;
            --box2-color: #FFE6AC;
            --box3-color: #E7D1FC;

            /* ====== Transition ====== */
            --tran-03: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.3s ease;
            --tran-05: all 0.3s ease;
        }

        body{
            min-height: 100vh;
            background-color: var(--body-color);
            transition: var(--tran-05);
        }

        ::selection{
            background-color: var(--primary-color);
            color: #fff;
        }

        body.dark{
            --body-color: #18191a;
            --sidebar-color: #242526;
            --primary-color: #3a3b3c;
            --primary-color-light: #3a3b3c;
            --toggle-color: #fff;
            --text-color: #ccc;
            --box1-color: #3A3B3C;
            --box2-color: #3A3B3C;
            --box3-color: #3A3B3C;
        }

        /* ===== Sidebar ===== */
        .sidebar{
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 10px 14px;
            background: var(--sidebar-color);
            transition: var(--tran-05);
            z-index: 100;  
        }
        .sidebar.close{
            width: 88px;
        }

        /* ===== Reusable code - Here ===== */
        .sidebar li{
            height: 50px;
            list-style: none;
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .sidebar header .image,
        .sidebar .icon{
            min-width: 60px;
            border-radius: 6px;
        }

        .sidebar .icon{
            min-width: 60px;
            border-radius: 6px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .sidebar .text,
        .sidebar .icon{
            color: var(--text-color);
            transition: var(--tran-03);
        }

        .sidebar .text{
            font-size: 17px;
            font-weight: 500;
            white-space: nowrap;
            opacity: 1;
        }
        .sidebar.close .text{
            opacity: 0;
        }
        /* =========================== */

        .sidebar header{
            position: relative;
        }

        .sidebar header .image-text{
            display: flex;
            align-items: center;
        }
        .sidebar header .logo-text{
            display: flex;
            flex-direction: column;
        }
        header .image-text .name {
            margin-top: 2px;
            font-size: 18px;
            font-weight: 600;
        }

        header .image-text .profession{
            font-size: 16px;
            margin-top: -2px;
            display: block;
        }

        .sidebar header .image{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar header .image img{
            width: 40px;
            border-radius: 6px;
        }

        .sidebar header .toggle{
            position: absolute;
            top: 50%;
            right: -25px;
            transform: translateY(-50%) rotate(180deg);
            height: 25px;
            width: 25px;
            background-color: var(--primary-color);
            color: var(--sidebar-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            cursor: pointer;
            transition: var(--tran-05);
        }

        body.dark .sidebar header .toggle{
            color: var(--text-color);
        }

        .sidebar.close .toggle{
            transform: translateY(-50%) rotate(0deg);
        }

        .sidebar .menu{
            margin-top: 40px;
        }

        .sidebar li.search-box{
            border-radius: 6px;
            background-color: var(--primary-color-light);
            cursor: pointer;
            transition: var(--tran-05);
        }

        .sidebar li.search-box input{
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            background-color: var(--primary-color-light);
            color: var(--text-color);
            border-radius: 6px;
            font-size: 17px;
            font-weight: 500;
            transition: var(--tran-05);
        }
        .sidebar li a{
            list-style: none;
            height: 100%;
            background-color: transparent;
            display: flex;
            align-items: center;
            height: 100%;
            width: 100%;
            border-radius: 6px;
            text-decoration: none;
            transition: var(--tran-03);
        }

        .sidebar li a:hover{
            background-color: var(--primary-color);
        }
        .sidebar li a:hover .icon,
        .sidebar li a:hover .text{
            color: var(--sidebar-color);
        }
        body.dark .sidebar li a:hover .icon,
        body.dark .sidebar li a:hover .text{
            color: var(--text-color);
        }

        .sidebar .menu-bar{
            height: calc(100% - 55px);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: scroll;
        }
        .menu-bar::-webkit-scrollbar{
            display: none;
        }
        .sidebar .menu-bar .mode{
            border-radius: 6px;
            background-color: var(--primary-color-light);
            position: relative;
            transition: var(--tran-05);
        }

        .menu-bar .mode .sun-moon{
            height: 50px;
            width: 60px;
        }

        .mode .sun-moon i{
            position: absolute;
        }
        .mode .sun-moon i.sun{
            opacity: 0;
        }
        body.dark .mode .sun-moon i.sun{
            opacity: 1;
        }
        body.dark .mode .sun-moon i.moon{
            opacity: 0;
        }

        .menu-bar .bottom-content .toggle-switch{
            position: absolute;
            right: 0;
            height: 100%;
            min-width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            cursor: pointer;
        }
        .toggle-switch .switch{
            position: relative;
            height: 22px;
            width: 40px;
            border-radius: 25px;
            background-color: var(--toggle-color);
            transition: var(--tran-05);
        }

        .switch::before{
            content: '';
            position: absolute;
            height: 15px;
            width: 15px;
            border-radius: 50%;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            background-color: var(--sidebar-color);
            transition: var(--tran-04);
        }

        body.dark .switch::before{
            left: 20px;
        }

        /* .home{
            position: absolute;
            top: 0;
            top: 0;
            left: 250px;
            height: 100vh;
            width: calc(100% - 250px);
            background-color: var(--body-color);
            transition: var(--tran-05);
        }
        .home .text{
            font-size: 30px;
            font-weight: 500;
            color: var(--text-color);
            padding: 12px 60px;
        }

        .sidebar.close ~ .home{
            left: 78px;
            height: 100vh;
            width: calc(100% - 78px);
        } */
        
        body.dark .content .text{
            color: var(--text-color);
        }

        .content {
            margin-left: 250px; /* Adjust this value based on your sidebar width */
            transition: margin-left var(--tran-05);
        }

        .sidebar.close ~ .content {
            margin-left: 88px; /* Adjust this value based on your collapsed sidebar width */
        }
        
        ol,ul {
        padding-left: 0rem;
        }

        /* Add this rule to override the padding-left for the menu-links */
        .menu-links {
        padding-left: 0;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Scripts
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>
                <div class="text logo-text">
                    <span class="name">MyINTI</span>
                    <span class="profession">Admin</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="{{ route('dashboard') }}">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('food') }}">
                            <i class='bx bx-food-menu icon' ></i>
                            <span class="text nav-text">Food Menu</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('approval') }}">
                            <i class='bx bx-file icon' ></i>
                            <span class="text nav-text">Approvals</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('message') }}">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Message</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('booking') }}">
                            <i class='bx bx-bookmark-alt-plus icon' ></i>
                            <span class="text nav-text">Facility Booking</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('order') }}">
                            <i class='bx bx-receipt icon' ></i>
                            <span class="text nav-text">Order History</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="{{ route('login') }}" >
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>
    </nav>

    <main class="content">
        @yield('content')
    </main>
</body>
<script>
       document.addEventListener("DOMContentLoaded", function() {
            // Your code here
            const body = document.querySelector('body');
            const sidebar = body.querySelector('nav');
            const toggle = body.querySelector(".toggle");
            const searchBtn = body.querySelector(".search-box");
            const modeSwitch = body.querySelector(".toggle-switch");
            const modeText = body.querySelector(".mode-text");
            const content = body.querySelector(".content")

            // Check the initial dark mode preference and apply the class if necessary
            var darkModeEnabled = localStorage.getItem('darkModeEnabled') === 'true';
            body.classList.toggle("dark", darkModeEnabled);
            modeText.innerText = darkModeEnabled ? "Light mode" : "Dark mode";
        

            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
                handleSidebarToggle();
            });

            searchBtn.addEventListener("click", () => {
                sidebar.classList.remove("close");
                handleSidebarToggle();
            });

            modeSwitch.addEventListener("click", () => {
                darkModeEnabled = !darkModeEnabled;
                body.classList.toggle("dark", darkModeEnabled);
                modeText.innerText = darkModeEnabled ? "Light mode" : "Dark mode";

                // Store the updated dark mode state in local storage
                localStorage.setItem('darkModeEnabled', darkModeEnabled);
            });

            // Function to handle sidebar open/close event
            function handleSidebarToggle() {
                const isSidebarOpen = !sidebar.classList.contains("close");
                const sidebarWidth = isSidebarOpen ? 250 : 88; // Adjust these values based on your sidebar width and collapsed state

                const content = document.querySelector('.content');
                content.style.marginLeft = `${sidebarWidth}px`;
            }

            handleSidebarToggle();
        });

    </script>
</html>
