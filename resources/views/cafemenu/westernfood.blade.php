@extends('layouts.cafe')

@section('content')
<head>
  <title>INTI Cafeteria</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

  <!--PAGE TITLE-->
  <h1>WESTERN FOOD</h1>

  <!--WEB DESIGN Class name-->
  <div class="food-container">

<!--1st westernfood row with details-->
<div class="food-item">
        
      <div class="food-image">
        <img src = "{{ asset('cafeWestern/chicken chop.png') }}">
      </div>

      <div class="food-details">
        <h2>Chicken Chop</h2>
        <p>Chicken chop is a popular Western dish that features a grilled or pan-fried chicken breast or thigh. 
            The chicken is seasoned with herbs and spices, cooked until it's juicy and tender.</p>
      </div>

      <div class="food-price">
        <p class="price">RM 10.50</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--2nd westernfood row with details-->
<div class="food-item">

      <div class="food-image">
      <img src = "{{ asset('cafeWestern/fish.png') }}">
      </div>

      <div class="food-details">
        <h2>Fish and Chips</h2>
        <p>Fish and chips is a beloved British dish that has become a global favorite. 
           It consists of a fillet of white fish, typically cod or haddock, coated in a light batter and deep-fried until crispy and golden.</p>
      </div>

      <div class="food-price">
        <p class="price">RM 10.00</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--3rd westernfood row with details-->
<div class="food-item">

    <div class="food-image">
    <img src = "{{ asset('cafeWestern/grilled.png') }}">
    </div>

    <div class="food-details">
      <h2>Grilled Chicken</h2>
      <p>Grilled chicken is a healthier alternative to fried chicken. It involves marinating chicken pieces, 
         often boneless and skinless breasts or thighs, in a flavorful blend of herbs, spices, and sometimes a marinade sauce.</p>
    </div>

    <div class="food-price">
      <p class="price">RM 10.50</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>

<!--4th westernfood row with details-->
<div class="food-item">

    <div class="food-image">
    <img src = "{{ asset('cafeWestern/cordon.png') }}">
    </div>

    <div class="food-details">
      <h2>Cordon Bleu</h2>
      <p>Cordon Bleu is a classic dish that features a breaded and fried chicken breast stuffed with ham and cheese. The chicken breast is pounded thin, 
        layered with slices of ham and cheese, rolled up, breaded, and then pan-fried or deep-fried until golden and crispy.</p>
    </div>

    <div class="food-price">
      <p class="price">RM 11.00</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>




    <!-- Add more food items as needed -->

</div>

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