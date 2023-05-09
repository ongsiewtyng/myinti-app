<!DOCTYPE html>

<html>

<head>
  <title>INTI Cafeteria</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

  <!--PAGE TITLE-->
  <h1>DRINKS</h1>

  <!--WEB DESIGN Class name-->
  <div class="food-container">

<!--1st drink row with details-->
<div class="food-item">
        
    <div class="food-image">
    <img src = "{{ asset('cafeDrinks/IceMilo.png') }}">
      </div>

      <div class="food-details">
        <h2>Ice Milo</h2>
        
      </div>

      <div class="food-price">
        <p class="price">RM 2.50</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--2nd drink row with details-->
<div class="food-item">

      <div class="food-image">
      <img src = "{{ asset('cafeDrinks/icelemontea.jpg') }}">
      </div>

      <div class="food-details">
        <h2>Ice Lemon Tea</h2>
        
      </div>

      <div class="food-price">
        <p class="price">RM 2.00</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--3rd drink row with details-->
<div class="food-item">

    <div class="food-image">
    <img src = "{{ asset('cafeDrinks/icetea.jpg') }}">
    </div>

    <div class="food-details">
      <h2>Ice Tea</h2>
      
    </div>

    <div class="food-price">
      <p class="price">RM 2.00</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>

<!--4th drink row with details-->
<div class="food-item">

    <div class="food-image">
    <img src = "{{ asset('cafeDrinks/icecoffee.jpg') }}">
    </div>

    <div class="food-details">
      <h2>Ice Coffee</h2>
      
    </div>

    <div class="food-price">
      <p class="price">RM 1.70</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>

<!--5th drink row with details-->
<div class="food-item">

    <div class="food-image">
        <img src = "{{ asset('cafeDrinks/orangejuice.jpg') }}">
    </div>

    <div class="food-details">
      <h2>Orange Juice</h2>
    </div>

    <div class="food-price">
      <p class="price">RM 3.00</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>

<!--6th drink row with details-->
<div class="food-item">

    <div class="food-image">
        <img src = "{{ asset('cafeDrinks/applejuice.webp') }}">
    </div>

    <div class="food-details">
      <h2>Apple Juice</h2>
      
    </div>

    <div class="food-price">
      <p class="price">RM 3.00</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>

    <!-- Add more food items as needed -->

</div>

  <!-- <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>  -->
</body>
</html>


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