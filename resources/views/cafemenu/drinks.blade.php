@extends('layouts.cafe')

@section('content')
<head>
  <title>INTI Cafeteria</title>
</head>

<body>

  <!--PAGE TITLE-->
  <h1>DRINKS</h1>

  <!--WEB DESIGN Class name-->
  <div class="food-container">

  <!--1st drink row with details-->
  @foreach ($foods as $food)
    @if ($food->available)
      <div class="food-item">
          <div class="food-image">
              <img src="{{ asset('cafeDrinks/' . $food->pic) }}" style="width: 300px; height: auto; justify-content: center;">
          </div>

          <div class="food-details">
              <h2>{{ $food->name }}</h2>
              <p>{{ $food->description }}</p>
          </div>

          <div class="food-price">
              <p class="price">RM {{ $food->price }}</p>
          </div>

          <div class="food-select">
            <button class="select-btn"
                    name="{{ $food->name }}"
                    price="{{ $food->price }}"
                    id="{{ $food->id }}">Select</button>
          </div>
      </div>
    @endif
  @endforeach

  <!-- <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>  -->
</body>
@endsection

@section('styles')
<style>
  body, h1, p, button {
      margin: 0;
      padding: 0;
    }
    
    /* Center align the text */
    h1, h2, p {
      text-align: center;
    }
    
    /* Set width for the container */
    .food-container {
      max-width: 1200px;
      margin: 0 auto;
    }
    
    /* Style each food item */
    .food-item {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
    
    /* Set width for each column */
    .food-image {
      flex-basis: 25%;
      padding: 10px;
    }
    
    .food-details {
      flex-basis: 35%;
      padding: 10px;
    }
    
    .food-price {
      flex-basis: 20%;
      padding: 10px;
    }
    
    .food-select {
      flex-basis: 20%;
      padding: 10px;
    }
    
    /* Style food image */
    .food-image img {
      width: 100%;
      height: auto;
    }
    
    /* Style food item details */
    .food-details h2 {
      margin-bottom: 10px;
    }
    
    /* Style price */
    .price {
      font-weight: bold;
    }
    
    /* Style select button */
    .select-btn {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 8px 16px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      cursor: pointer;
      border-radius: 4px;
    }
    
    .select-btn i {
      margin-right: 5px;
    }
    
    .select-btn:hover {
      background-color: #45a049;
    }

</style>