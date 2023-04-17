@extends('layouts.main')

@section('content')
    <body>
        <div class="container text-center">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                        <!-- <div class="banner">
                            <div id="banner" class="carousel slide" data-ride="carousel">
                                <div class="banner 1 box"> -->
                                    <div class="carousel-item active">
                                        <div class="col-md-6">   
                                            <h2 style="color: #000000;">Tapau! Food</h2>
                                            <p style="color: #000000;">Reserve meals for events or order food directly from campus dining options, all in one place.</p>
                                        </div>
                                        <div class="col-md-6">   
                                            <img src="{{ asset('image/icons/coffee.png') }}" class="" alt="Banner Image 1">
                                            <img src="{{ asset('image/icons/pancake.png') }}" class="" alt="Banner Image 2">
                                        </div>
                                    </div>
                                    <!-- <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h2>Event Proposal Approval</h2>
                                                    <p>Easily submit and track the progress of event proposals on campus, ensuring a streamlined process for student organizations.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <img src="banner-image-2.jpg" class="d-block w-50" alt="Banner Image 2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h2>Facility Reservation</h2>
                                                    <p>Reserve spaces for events, meetings, or study sessions with just a few clicks.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <img src="banner-image-3.jpg" class="d-block w-50" alt="Banner Image 3">
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- </div>                        
                                <ol class="carousel-indicators">
                                    <li data-target="#banner" data-slide-to="0" class="active"></li>
                                    <li data-target="#banner" data-slide-to="1"></li>
                                    <li data-target="#banner" data-slide-to="2"></li>
                                    <li data-target="#banner" data-slide-to="3"></li>
                                    <li data-target="#banner" data-slide-to="4"></li>
                                </ol>
                                

                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>


        <script>
            var indicators = document.querySelectorAll('#banner .carousel-indicators li');
            indicators.forEach(function(indicator, index) {
                indicator.addEventListener('click', function() {
                    var banner = document.getElementById('banner');
                    var carousel = bootstrap.Carousel.getInstance(banner);
                    carousel.to(index);
                });
            });
        </script>
    </body>
@endsection

@section('styles')
<style>
    /* .banner {
        background: #fff;
        padding: 50px 0;
        height: 300px; 
    }
    
    .banner .box1{
        background: #fff;
        padding: 50px 0;
        height: 300px; 
        width: 100%; 
        border: 1px solid #000000;
    }
    
    
    .banner .carousel-indicators {
        bottom: -50px;
        
    }
    .banner .carousel-indicators li {
        border: 1px solid #000000;
        border-radius: 10px;
        width: 50px;
        height: 8px;
        margin: 1.5px;
    }
    .banner .carousel-indicators li.active {
        background: #BCD3F2;
        border: 1px solid #000000;
    }
    .banner .carousel-indicators li:hover {
        background: #BCD3F2;
        border: 1px solid #000000;
    }

    
    .carousel-inner {
        height: 350px; 
        width: 100%; 
        border: 5px solid rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .carousel-item {
        height: 500px;
    }
    .carousel-item img {
        position: absolute;
        top: 30%;
        right: 0;
        transform: translate(0, -50%);
        width: 200px !important; 
        height: auto; 
    }
    .carousel-caption h2,
    .carousel-caption p {
        color: #000000;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .carousel-caption h2 {
        left: 10%;
    }

    .carousel-caption p {
        left: 15%;
    }  */






</style>
@endsection
