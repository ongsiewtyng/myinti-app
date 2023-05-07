@extends('layouts.main')

@section('content')

<title>@yield('title', 'Tapau! Food')</title>

<head>
	<title>Food Canteen</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		
		main {
			margin: 40px;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around;
			align-items: flex-start;
		}
		article {
			width: 300px;
			margin-bottom: 60px;
			border: 1px solid #de3434;
			border-radius: 20px;
			overflow: hidden;
			box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
		}
		article img {
			width: 100%;
			height: 200px;
			object-fit: cover;
		}
		article h2 {
			margin: 10px;
			font-size: 27px;
		}
		article p {
			margin: 10px;
			font-size: 16px;
			line-height: 1.5;
			text-align: justify;
		}
		footer {
			background-color: #00ff37;
			color: white;
			padding: 100px;
			text-align: center;
		}

	</style>
</head>

<!-- 1 // HOME SECTION -->

<!-- To include the header -->
<link rel="import" href="home.html">
<body>
        <header>
            <h1>INTI Cafeteria</h1>
            <p>Delicious food at affordable prices</p>
        </header>
    
        <nav>
            <a href="#">Home</a>
            <a href="#">Menu</a>
            <a href="#">Contact</a>
        </nav>
        <main>

            <section>
                <h2>About Us</h2>
                <p>We are Inti Canteen that provides a wide range of delicious and affordable meals for our customers. Our menu consists of a variety of local and international dishes, prepared by our experienced chefs.</p>
            </section>
    
            <section>
                <h2>Menu</h2>
                <p>Check out our menu and order online:</p>
                <ul>
                    <li><a href="#">Sandwiches</a></li>
                    <li><a href="#">Burgers</a></li>
                    <li><a href="#">Wraps</a></li>
                    <li><a href="#">Snakcs</a></li>
                    <li><a href="#">Western Food</a></li>
                    <li><a href="#">Fried Rice</a></li>
                    <li><a href="#">Noodles</a></li>
                </ul>
            </section>
    
            <section>
                <h2>Order Online</h2>
                <p>Place your order online :</p>
                <form>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"><br><br>
    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"><br><br>
    
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone"><br><br>
    
                    <input type="submit" value="ENTER">
                </form>
            </section>
    
            <section>
                <h2>Contact Us</h2>
                <p>Get in touch with us:</p>
                <ul>
                    <li>Address: 1-Z, Lebuh Bukit Jambul, Bukit Jambul, 11900 Bayan Lepas, Pulau Pinang</li>
                    <li>Level : 2nd Floor</li>
                    <li>Phone: 017-7562177</li>
                    <li>Email: inticafeteria@penang.com</li>
                </ul>
            </section>
    

    
        </main>
</body>

<!--2 // MENU SECTION -->

<!-- To include the header -->
<link rel="import" href="menu.html">
<body>
	<header>
		<h1>Food Canteennn</h1>
		<p>Delicious food at affordable prices</p>
	</header>

<main>

		<article>
			<img src="https://via.placeholder.com/300x200.png?text=Food+Item+1" alt="Food Item 1">
			<h2>Chicken Sandwich</h2>
			<p>Grilled chicken breast on a bed of lettuce and tomato, served on whole wheat bread..</p>
            <p>Price : RM 0</p>
		</article>

		<article>
			<img src="https://via.placeholder.com/300x200.png?text=Food+Item+2" alt="Food Item 2">
			<h2>Beef Burger</h2>
			<p>A juicy beef patty with lettuce, tomato, onion, and pickle, served on a sesame seed bun.</p>
            <p>Price : RM 0</p>
		</article>

		<article>
			<img src="https://via.placeholder.com/300x200.png?text=Food+Item+3" alt="Food Item 3">
            <h2>Chicken Wrap</h2>
			<p>A tortilla filled with chicken meat, cheese, vegetables, and sauces, rolled up like a burrito.</p>
            <p>Price : RM 0</p>
        </article>

        <article>
			<img src="https://via.placeholder.com/300x200.png?text=Food+Item+4" alt="Food Item 4">
            <h2>Beef Wrap</h2>
			<p>A large flour tortilla filled with seasoned ground beef, rice, beans, cheese, and salsa, rolled up and served hot.</p>
            <p>Price : RM 0</p>
        </article>

        <article>
			<img src="https://via.placeholder.com/300x200.png?text=Food+Item+5" alt="Food Item 5">
            <h2>Fish and Chips</h2>
			<p>A dish consisting of battered and fried fish fillets served with French fries and tartar sauce.</p>
            <p>Price : RM 0</p>
        </article>

        <article>
			<img src="https://via.placeholder.com/300x200.png?text=Food+Item+6" alt="Food Item 6">
            <h2>Tom Yam Fried Rice</h2>
			<p>A dish stir-fried with shrimp, carrots, bell peppers, and onions, and a combination of spices and seasonings.</p>
            <p>Price : RM 0</p>
        </article>

        <article>
			<img src="https://via.placeholder.com/300x200.png?text=Food+Item+7" alt="Food Item 7">
            <h2>Chicken Chop </h2>
			<p>A dish consisting of a seasoned and breaded chicken breast that has been pan-fried or grilled until crispy, 
                and served with a variety of side dishes like fries or potato wedges.</p>
            <p>Price : RM 14</p>
        </article>
  </main>

</body>


<!-- 3 // CONTACT SECTION -->

<!-- To include the header -->
<link rel="import" href="contact.html">

    <body>
        <header>
            <h1>INTI Cafeteria</h1>
            <p>Delicious food at affordable prices</p>
        </header>
    
        <nav>
            <a href="#">Home</a>
            <a href="#">Menu</a>
            <a href="#">Contact</a>
        </nav>

        <main>
    
            <section>

                <h2>Get in Touch</h2> 

                <form action="#" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required> <br><br>
    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required> <br><br>
    
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone"> <br><br>
    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="10" required></textarea>  <br><br>
    
                    <input type="submit" value="SEND">
                </form>
            </section>
    
            <section>
                <h2>Visit Us</h2>
                <p>Our cafeteria is located at :</p>
                <address>
                    1-Z, Lebuh Bukit Jambul, Bukit Jambul,<br>
                     11900 Bayan Lepas, <br>
                     Pulau Pinang<br> <br>

                    Phone: 017-7562177
                </address>
            </section>

    
        </main>
    </body>
@endsection
