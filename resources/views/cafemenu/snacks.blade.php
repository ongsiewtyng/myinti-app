@extends('layouts.cafe')

@section('content')
<head>
  <title>INTI Cafeteria</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

  <!--PAGE TITLE-->
  <h1>SNACKS</h1>

  <!--WEB DESIGN Class name-->
  <div class="food-container">

<!--1st snack row with details-->
<div class="food-item">
        
    <div class="food-image">
      <img src = "{{ asset('cafeSnacks/fries ok.png') }}">

    </div>

      <div class="food-details">
        <h2>French Fries</h2>
        <p>Crispy and golden potato fries, usually served hot and seasoned with salt or other seasonings. </p>
      </div>

      <div class="food-price">
        <p class="price">RM 4.50</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--2nd snack row with details-->
<div class="food-item">

      <div class="food-image">
        <img src = "{{ asset('cafeSnacks/nachos ok.png') }}">

      </div>

      <div class="food-details">
        <h2>Nachos</h2>
        <p>Crispy tortilla chips topped with melted cheese, salsa, guacamole, sour cream.</p>
      </div>

      <div class="food-price">
        <p class="price">RM 5.00</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--3rd snack row with details-->
<div class="food-item">

    <div class="food-image">
       <img src = "{{ asset('cafeSnacks/wings ok.png') }}"> 

    </div>

    <div class="food-details">
      <h2>Chicken Wings</h2>
      <p>Deep-fried chicken wings coated in a variety of sauces like buffalo, barbecue, or teriyaki. </p>
    </div>

    <div class="food-price">
      <p class="price">RM 6.50</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>


<!--4th snack row with details-->
<div class="food-item">

    <div class="food-image">
      <img src = "{{ asset('cafeSnacks/popcorn ok.png') }}">
    </div>

    <div class="food-details">
      <h2>Popcorn</h2>
      <p>Light and fluffy popped corn kernels, often seasoned with salt or butter. </p>
    </div>

    <div class="food-price">
      <p class="price">RM 5.00</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>


<!--5th snack row with details-->
<div class="food-item">

    <div class="food-image">
      <img src = "{{ asset('cafeSnacks/fruit ok.png') }}">
    </div>

    <div class="food-details">
      <h2>Fruit Cups</h2>
      <p>Fresh fruits, such as watermelon, pineapple, grapes, and berries, served in a cup or container. </p>
    </div>

    <div class="food-price">
      <p class="price">RM 3.50</p>
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
