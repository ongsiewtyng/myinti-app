@extends('layouts.main')

@section('content')
<body>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- slide images start -->
            <div class="swiper-slide">
                <div class="container text-center">
                    <div class="card">
                        <div class="circle"></div>
                        <div class="card-body">
                        <a href="/service2">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 style="color: #000000;" class="order">ORDER</h2>
                                    <h2 style="color: #000000;" class="now">NOW</h2>
                                    <p style="color: #000000;" class="text2">Hate queuing?! Order food directly from campus dining options, all in one place.</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <img src="{{ asset('image/icons/noodles.png') }}" class="noodle" alt="Banner Image 1">
                                    <img src="{{ asset('image/icons/queue.png') }}" class="queue" alt="Banner Image 2">
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container text-center">
                    <div class="card">
                        <div class="circle2"></div>
                        <div class="card-body">
                        <a href="/service1">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 style="color: #000000;" class="need">NEED</h2>
                                    <h2 style="color: #000000;" class="approval">APPROVAL?</h2>
                                    <p style="color: #000000;" class="text3">Got a new event? Need stamp approval from INTIMA quick and smooth process. Submit your documents through our service.</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <img src="{{ asset('image/icons/folder.png') }}" class="folder" alt="Banner Image 1">
                                    <img src="{{ asset('image/icons/check.png') }}" class="check" alt="Banner Image 2">
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="container text-center">
                    <div class="card">
                        <div class="circle3"></div>
                        <div class="card-body">
                        <a href="/service3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 style="color: #000000;" class="free">FREE</h2>
                                    <h2 style="color: #000000;" class="time">TIME?</h2>
                                    <p style="color: #000000;" class="text4">Taking a break from class? Want to use the pool table but it being occupied? Use our service to book and pay for the facility before anyone.</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <img src="{{ asset('image/icons/basketball.png') }}" class="games" alt="Banner Image 1">
                                    <img src="{{ asset('image/icons/dice.png') }}" class="dice" alt="Banner Image 2">
                                </div></a>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- Add pagination bullets -->
        <div class="swiper-pagination" style="position:inherit"></div>
            

        <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
        
            },
            autoplay: {
                delay: 4500,
            },
            loop: true,
        });

        </script>
    </div>
</body>
@endsection

@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Unbounded&display=swap');

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-body{
        width: 1403px;
        height: 383px;
    }
    .card{
        position: relative;
        clip-path: inset(0);
    }
    .circle {
        width: 491px;
        height: 491px;
        background-color: #BEFFA0;
        border-radius: 50%;
        position: absolute;
        left: 910px;
        top: -190px;
        z-index: 1;
        }

    .circle2{
        width: 491px;
        height: 491px;
        background-color: #FFE870;
        border-radius: 50%;
        position: absolute;
        left: 910px;
        top: -190px;
        z-index: 1;
    }

    .circle3{
        width: 491px;
        height: 491px;
        background-color: #C2E2FF;
        border-radius: 50%;
        position: absolute;
        left: 910px;
        top: -190px;
        z-index: 1;
    }

    .order {
        position: absolute;
        width: 203px;
        height: 60px;
        left: 243px;
        top: 123px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */
        display: flex;
        align-items: center;
    }

    .now {
        position: absolute;
        width: 180px;
        height: 60px;
        left: 345px;
        top: 193px;

        font-family: 'Unbounded','sans-serif';
        font-style: normal;
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */

        display: flex;
        align-items: center;
        
    }
    .text2{
        font-size: 20px;
        margin-top: 50px;
        font-family: 'Anuphan', sans-serif;
        white-space: nowrap;
        position: absolute;
        width: 705px;
        height: 93px;
        left: 60px;
        top: 200px;
        line-height: 31px;
        display: flex;
        align-items: center;
    }

    .text3{
        position: absolute;
        width: 705px;
        height: 62px;
        left: 82px;
        top: 260px;

        font-family: 'Anuphan', sans-serif;
        font-size: 20px;
        line-height: 31px;
        display: flex;
        align-items: center;
    }

    .text4{
        position: absolute;
        width: 705px;
        height: 62px;
        left: 82px;
        top: 280px;

        font-family: 'Anuphan', sans-serif;
        font-size: 20px;
        line-height: 31px;
        display: flex;
        align-items: center;
    }

    .noodle {
        position:relative;
        width: 350px;
        height:350px;
        margin-top: -10px;
        left:600px;
        z-index: 2;
    }

    .queue{
        position: absolute;
        width: 300px;
        height: 300px;
        left: 5px;
        top: 35px;
    }

    .need{
        position: absolute;
        width: 162px;
        height: 50px;
        left: 243px;
        top: 110px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */

        display: flex;
        align-items: center;
    }

    .approval{
        position: absolute;
        width: 343px;
        height: 50px;
        left: 318px;
        top: 183px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */

        display: flex;
        align-items: center;
    }

    .folder{
        position: absolute;
        width: 350px;
        height: 350px;
        margin-top: -10px;
        right:100px;
        z-index: 2;

    }

    .check{
        position: absolute;
        width: 225px;
        height: 204px;
        left: 34px;
        top: 61px;
    }

    .free{
        position: absolute;
        width: 148px;
        height: 60px;
        left: 300px;
        top: 106px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */
        display: flex;
        align-items: center;
    }

    .time{
        position: absolute;
        width: 177px;
        height: 60px;
        left: 400px;
        top: 178px;

        font-family: 'Unbounded','sans-serif';
        font-weight: 400;
        font-size: 48px;
        line-height: 60px;
        /* identical to box height */
        display: flex;
        align-items: center;
    }

    .games{
        position: absolute;
        width: 582px;
        height: 328px;
        left: 750px;
        top: 34px;
        z-index: 2;

    }

    .dice{
        position: absolute;
        width: 256px;
        height: 256px;
        left: 25px;
        top: 40.37px;
        transform: rotate(-19.48deg);
    }

    /* @media only screen and (max-width: 400px) {
        .card-body {
            width: auto;
            height: auto;
        }

        .circle,
        .circle2,
        .circle3 {
            width: 150px;
            height: 150px;
            left: 88%;
            top: -30px;
            transform: translateX(-50%);
        }

        .order,
        .now,
        .need,
        .approval,
        .free,
        .time {
            font-size: 24px;
            line-height: 30px;
            left: 110px;
            top: 70px;
        }

        .now{
            width: 180px;
            height: 60px;
            left: 136px;
            top: 100px;
        }

        .text2,
        .text3,
        .text4 {
            font-size: 16px;
            line-height: 20px;
            width: 100%;
            left: 0;
            top: 100px;
            text-align: center;
        }

        .noodle,
        .folder,
        .games {
            width: 120px;
            height: 120px;
            left: 45%;
            top: 64%;
            margin-top: 75px;
            transform: translate(-50%, -50%);
        }

        .queue {
            width: 150px;
            height: 150px;
            left: 15%;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .check {
            width: 100px;
            height: 90px;
            left: 17px;
            top: 30px;
        }

        .dice {
            width: 100px;
            height: 100px;
            left: 12.5px;
            top: 20.19px;
        }
    } */

</style>
@endsection
