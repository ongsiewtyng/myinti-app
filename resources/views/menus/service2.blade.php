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
		<h1>INTI Cafeteria</h1>
		<p>Delicious food at affordable prices</p>
	</header>

    <nav>
            <a href="#">Home</a>
            <a href="#">Menu</a>
            
    </nav>

	<main>

		<article>
			<!--  <img src="https://via.placeholder.com/300x200.png?text=Food+Item+1" alt="Food Item ">   -->
            <!--  <img src = {{ asset('sandwich/.jpg')}}>  -->
            <img src = "{{ asset('cafeMenu/sandwich.jpg') }}" alt="Facility Icon">


			<h2>Sandwiches</h2>
		</article>

		<article>
			
			<h2>Burgers</h2>
		</article>

		<article>
			
            <h2>Wraps</h2>
        </article>

        <article>

            <h2>Snacks</h2>
        </article>

        <article>

            <h2>Western Food</h2>
        </article>

        <article>

            <h2>Fried Rice</h2>
        </article>

        <article>
            
            <h2>Noodles</h2>
        </article>

	</main>
</body>


<!-- 3 // CONTACT SECTION -->

<!-- To include the header 
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

    
        </main>
    </body>  -->
@endsection
