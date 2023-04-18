@extends('layouts.main')

@section('content')
    <body>
        <div class="container text-center">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 style="color: #000000;" class="text1">Tapau! Food</h2>
                            <p style="color: #000000;" class="text2">Reserve meals for events or order food directly from campus dining options, all in one place.</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <img src="{{ asset('image/icons/tapau.gif') }}" class="coffee" alt="Banner Image 1">
                        </div>
                    </div>
                </div>
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
    @import url('https://fonts.cdnfonts.com/css/maybe-coffee');
    .text1 {
        font-size: 60px;
        font-weight: 700;
        margin-top: 100px;
        font-family: 'Maybe Coffee', sans-serif;
        transform:rotate(-5deg);
    }
    .text2{
        font-size: 15px;
        font-weight: 600;
        margin-top: 50px;
        font-family: 'Ballega', sans-serif;
        white-space: nowrap;
    
    }

    .coffee {
        width: 300px;
        margin-top: -40px;
    }

</style>
@endsection
