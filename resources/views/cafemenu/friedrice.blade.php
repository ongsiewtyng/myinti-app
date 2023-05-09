<!DOCTYPE html>

<html>

<head>
  <title>INTI Cafeteria</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

  <!--PAGE TITLE-->
  <h1>FRIED RICE</h1>

  <!--WEB DESIGN Class name-->
  <div class="food-container">

<!--1st fried rice row with details-->
<div class="food-item">

    <div class="food-image">
      <img src = "{{ asset('cafeFried/yongchow.png') }}">
      </div>

      <div class="food-details">
        <h2>Yong Chow Fried Rice</h2>
        <p>Yong Chow Fried Rice is a popular Chinese-style fried rice that typically includes 
            a combination of diced chicken, shrimp, Chinese sausage (lap cheong), and various vegetables like peas, carrots, and onions. </p>
      </div>

      <div class="food-price">
        <p class="price">RM 7.00</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--2nd fried rice row with details-->
<div class="food-item">

      <div class="food-image">
      <img src = "{{ asset('cafeFried/billis.png') }}">
      </div>

      <div class="food-details">
        <h2>Ikan Bilis Fried Rice</h2>
        <p> Ikan Bilis Fried Rice is a Malaysian-style fried rice that features small dried anchovies, known as ikan bilis. </p>
      </div>

      <div class="food-price">
        <p class="price">RM 7.00</p>
      </div>

      <div class="food-select">
        <button class="select-btn"><i class="fas fa-check"></i>Select</button>
      </div>

</div>

<!--3rd fried rice row with details-->
<div class="food-item">

    <div class="food-image">
    <img src = "{{ asset('cafeFried/tomyam.png') }}">
    </div>

    <div class="food-details">
      <h2>Tom Yam Fried Rice</h2>
      <p>Tom Yam Fried Rice is a Thai-inspired fried rice dish infused with the flavors of Tom Yam soup, 
        which is known for its spicy and tangy taste.</p>
    </div>

    <div class="food-price">
      <p class="price">RM 7.00</p>
    </div>

    <div class="food-select">
      <button class="select-btn"><i class="fas fa-check"></i>Select</button>
    </div>

</div>

<!--4th fried rice row with details-->
<div class="food-item">

    <div class="food-image">
    <img src = "{{ asset('cafeFried/garlic.png') }}">
    </div>

    <div class="food-details">
      <h2>Garlic Fried Rice</h2>
      <p>Garlic Fried Rice is a simple yet flavorful variation of fried rice that highlights the taste of garlic. 
         The dish is prepared by stir-frying cooked rice with minced garlic and sometimes chopped onions. </p>
    </div>

    <div class="food-price">
      <p class="price">RM 7.00</p>
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