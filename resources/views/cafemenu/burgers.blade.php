<!DOCTYPE html>

<html>

<head>
  <title>INTI Cafeteria</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

  <!--PAGE TITLE-->
  <h1>BURGERS</h1>

  <!--WEB DESIGN Class name-->
  <div class="food-container">

<!--1st burger row with details-->
<div class="food-item">
        
    <div class="food-image">
        <img src = "{{ asset('cafeBurgers/hawaiian.png') }}">
        
      </div>

      <div class="food-details">
        <h2>Hawaiian Burger</h2>
        <p>Hawaiian burger incorporates a beef or chicken patty topped with 
            a slice of grilled pineapple, crispy bacon, melted cheese, lettuce.</p>
      </div>

      <div class="food-price">
        <p class="price">RM 9.50</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--2nd burger row with details-->
<div class="food-item">

      <div class="food-image">
        <img src = "{{ asset('cafeBurgers/mushroom.png') }}">
        
      </div>

      <div class="food-details">
        <h2>Mushroom Burger</h2>
        <p>This burger features a juicy patty topped with imported mushrooms and melted Swiss cheese.</p>
      </div>

      <div class="food-price">
        <p class="price">RM 10.50</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--3rd burger row with details-->
<div class="food-item">

    <div class="food-image">
      <img src = "{{ asset('cafeBurgers/veggie.png') }}">
      
    </div>

    <div class="food-details">
      <h2>Veggie Burger</h2>
      <p>the veggie burger is a popular choice. Made with a patty consisting of vegetables, legumes, grains, 
        or soy, it offers a satisfying texture and is often complemented with toppings like lettuce, tomato, 
        onions, and special sauces.</p>
    </div>

    <div class="food-price">
      <p class="price">RM 10.00</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>


<!--4th burger row with details-->
<div class="food-item">

    <div class="food-image">
      <img src = "{{ asset('cafeBurgers/classic cheese.png') }}">

    </div>

    <div class="food-details">
      <h2>Classic Cheeseburger</h2>
      <p>The classic cheeseburger features a juicy beef patty cooked to perfection, 
        topped with melted cheese, lettuce, tomato, onions, pickles, and a dollop of ketchup or mayo.</p>
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