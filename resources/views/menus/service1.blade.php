@extends('layouts.main')

@section('content')

<body>
    <div class="header">
        <h1>Host Your Dream Event on Campus</h1>
        <div class="line"></div>
    </div>
    <div class="container">
        <p>If you're looking to host an event on campus, you're in the right place. Our platform provides a comprehensive event proposal system that streamlines the process of getting your event approved by the university.</p>
        <p2>Fill out the form below to submit your event proposal and take the first step towards hosting your dream event on campus!</p2>
    </div>
    <div class = "img1">
        <img src = "{{ asset('image/pic1.png') }}">
    </div>
    <div class = "img2">
        <img src = "{{ asset('image/pic2.png') }}">
    </div>
    <div class="form">
    <form action="/submit-proposal" method="post">
      @csrf <!-- add CSRF token for security -->
      <div class="form-group">
        <label for="club-name">Club Name:</label>
        <input type="text" class="form-control" id="club-name" name="club_name" required>
      </div>
      <div class="form-group">
        <label for="event-title">Event Title:</label>
        <input type="text" class="form-control" id="event-title" name="event_title" required>
      </div>
      <div class="form-group">
        <label for="date-time">Date and Time:</label>
        <input type="datetime-local" class="form-control" id="date-time" name="date_time" required>
      </div>
      <div class="form-group">
        <label for="urgency">How urgent do you need this event to be approved?</label>
        <select class="form-control" id="urgency" name="urgency" required>
          <option value="">Select urgency</option>
          <option value="Low">Low</option>
          <option value="Medium">Medium</option>
          <option value="High">High</option>
        </select>
      </div>
      <div class="form-group">
        <label for="document">Attach Document:</label>
        <input type="file" class="form-control-file" id="document" name="document" required>
      </div>
      <button type="submit" class="btn btn-primary" style = "background: #5E5BFF">Submit Proposal</button>
    </form>
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
        left: 650px;
        top: 150px;
        font-size: 32px;
        line-height: 43px;
        
        /* identical to box height */

        display: flex;
        align-items: center;

    }
    .line {
        position: absolute;
        width: 300px;
        height: 0px;
        left: 730px;
        top: 210px;

        border: 2px solid red;
    }

    p {
        position: absolute;
        width: 1383px;
        height: 52px;
        left: 200px;
        top: 240px;

        font-family: 'Anuphan';
        font-style: normal;
        font-size: 20px;
        line-height: 26px;
        display: flex;
        align-items: center;
        text-align: center;
    }

    p2 {
        position: absolute;
        width: 1150px;
        height: 26px;
        left: 350px;
        top: 310px;

        font-family: 'Anuphan';
        font-weight: bold;
        font-size: 20px;
        line-height: 26px;
        /* identical to box height */

        display: flex;
        align-items: center;
        text-align: center;
    }

    .form {
        position: absolute;
        width: 350px;
        height: 84px;
        left: 700px;
        top: 380px;
        
    }

    .form-group{
        padding:10px;
    }

    .btn-primary{
        position: absolute;
        width: 134px;
        height: 48px;
        left: 10px;
        top: 430px; 
        border-radius: 5px;
    }

    .img1 {
        position: absolute;
        left: 8%;
        right: 50%;
        top: 50%;
        bottom: 3.9%;
    }

    .img2 {
        position: absolute;
        left: 74%;
        right: 3.65%;
        top: 49%;
        bottom: 20%;
    }

        @keyframes scale {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(0.6);
        }
        100% {
            transform: scale(1);
        }
        }

        .img1, .img2 {
        animation: scale 3s infinite;
        }

</style>