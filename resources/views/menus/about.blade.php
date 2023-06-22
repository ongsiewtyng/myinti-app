@extends('layouts.main')

@section('content')
<body>
    
    <div class="header">
        <h1>About MyINTI</h1>
        <div class="line"></div>
    </div>

    <div class="header2">
        <h2>Mission Statement</h2>
        <div class="line2"></div>
    </div>

    <div class="paragraph">
        <p>Welcome to MyINTI, the one-stop solution for campus services designed to simplify your campus life. 
           Our mission is to provide college students with a streamlined and easy-to-use platform for event planning,
           food ordering, and facility reservations, all in one place.
        </p>
    </div>

    <div class="header3">
        <h3>Slide in to our mails</h3>
        <p2>support@myinti.com or <a href="/contact">HERE</a></p2>

        <!-- Add social icons -->
        <a href="https://www.facebook.com/your-page-url" target="_blank"><ion-icon name="logo-facebook" class="facebook"></ion-icon></a>
        <a href="https://www.instagram.com/your-page-url" target="_blank"><ion-icon name="logo-instagram" class="instagram"></ion-icon></a>
    </div>

    <div class = "img1">
        <img src = "{{ asset('image/group.png') }}">
    </div>
    
</body>

@endsection

@section('styles')
<style>
    @import url('https://fonts.cdnfonts.com/css/kopi-senja-sans');
    .body {
        font-family: 'Kopi Senja Sans', sans-serif;
        font-size: 16px;
        line-height: 1.5;
        margin: 0;
        padding: 0;
    }
    .header {
        font-family: 'Kopi Senja Sans', sans-serif;
        color: #000000;
        padding: 20px;
    }

    h1 {
        position: absolute;
        width: 512px;
        height: 43px;
        left: 780px;
        top: 150px;
        font-size: 32px;
        line-height: 43px;
        
        /* identical to box height */

        display: flex;
        align-items: center;
    }

    .line {
        position: absolute;
        width: 250px;
        height: 0px;
        left: 760px;
        top: 200px;

        border: 2px solid red;
    }

    .line2{
        position: absolute;
        width: 250px;
        height: 0px;
        left: 1px;
        top: 40px;

        border: 2px solid red;
    }

    .header2{
        position: absolute;
        width: 296px;
        height: 42px;
        left: 150px;
        top: 250px;

        font-family: 'Anuphan';
        font-size: 32px;
        line-height: 42px;
        /* identical to box height */

        letter-spacing: 0.04em; 
    }

    .paragraph{
        position: absolute;
        width: 1500px;
        height: 42px;
        left: 150px;
        top: 321px;

        font-family: 'Anuphan', sans-serif;
        font-size: 20px;
        line-height: 1.5;
        /* identical to box height */

        letter-spacing: 0.04em;
    }

    .header3{
        position: absolute;
        width: 296px;
        height: 42px;
        left: 150px;
        top: 500px;

        font-family: 'Anuphan';
        font-size: 20px;
        line-height: 42px;
        /* identical to box height */

        letter-spacing: 0.04em; 
    }

    .img1{
        position: absolute;
        width: 300px;
        height: 300px;
        left: 1300px;
        top: 470px;
    }

    .facebook {
        position: absolute;
        width: 40px;
        height: 40px;
        right: 258px;
        top: 87px;
    }

    .instagram {
        position: absolute;
        width: 40px;
        height: 40px;
        right: 190px;
        top: 87px;
    }

    /* @media query for max-width: 400px */
    /* @media only screen and (max-width: 400px) {
        .body {
            font-size: 14px;
        }

        .header {
            padding: 10px;
        }

        .header2,
        .paragraph,
        .header3 {
            font-size: 14px;
        }

        .img1 {
            width: 100%;
            height: auto;
            left: 0;
            top: 0;
        }

        .facebook,
        .instagram {
            width: 30px;
            height: 30px;
        }
    } */

</style>
@endsection