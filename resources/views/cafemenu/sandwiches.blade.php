@extends('layouts.cafe')

@section('content')
<head>
  <title>INTI Cafeteria</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

  <!--PAGE TITLE-->
  <h1>SANDWICHES</h1>

  <!--WEB DESIGN Class name-->
  <div class="food-container">

<!--1st sandwich row with details-->
<div class="food-item">
        
    <div class="food-image">
        <img src = "{{ asset('cafeSandwiches/chicken sandwich ok.png') }}">
        
      </div>

      <div class="food-details">
        <h2>Chicken Sandwich</h2>
        <p>Grilled or breaded chicken breast between two slices of bread or a bun with toppings like lettuce, tomato, and mayo.</p>
      </div>

      <div class="food-price">
        <p class="price">RM 5.00</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--2nd sandwich row with details-->
<div class="food-item">

      <div class="food-image">
        <img src = "{{ asset('cafeSandwiches/veggie sandwich ok.png') }}">
        
      </div>

      <div class="food-details">
        <h2>Veggie Sandwich</h2>
        <p>Fresh vegetables like lettuce, tomato, cucumber, and onions on bread with optional additions like cheese or hummus.</p>
      </div>

      <div class="food-price">
        <p class="price">RM 4.50</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--3rd sandwich row with details-->
<div class="food-item">

    <div class="food-image">
      <img src = "{{ asset('cafeSandwiches/grilled cheese ok.png') }}">
      
    </div>

    <div class="food-details">
      <h2>Grilled Cheese Sandwich</h2>
      <p>Melted cheese between two slices of grilled or toasted bread.</p>
    </div>

    <div class="food-price">
      <p class="price">RM 6.00</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>


<!--4th sandwich row with details-->
<div class="food-item">

    <div class="food-image">
      <img src = "{{ asset('cafeSandwiches/nutella ok.png') }}">
      
    </div>

    <div class="food-details">
      <h2>Nutella Sandwich</h2>
      <p>Two slices of bread with a generous spread of Nutella, a chocolate hazelnut spread.</p>
    </div>

    <div class="food-price">
      <p class="price">RM 5.00</p>
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