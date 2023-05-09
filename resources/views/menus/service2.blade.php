@extends('layouts.main')

@section('content')

<head>
	<title>Food Canteen</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<!-- 1 // HOME SECTION -->

<!-- To include the header -->
<body>
        <header>
            <h1>INTI Cafeteria</h1>
            <p>Delicious food at affordable prices</p>
        </header>
    
        <nav class="navigation">
            <a class= "home" href="#">Home</a>
            <a class= "menu" href="#">Menu</a>  
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
                    <li><a href="#">Snacks</a></li>
                    <li><a href="#">Western Food</a></li>
                    <li><a href="#">Fried Rice</a></li>
                    <li><a href="#">Noodles</a></li>
					<li><a href="/drink">Drinks</a></li>
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
            </section>x
        </main>
</body>

<!--2 // MENU SECTION -->

<!-- To include the header -->
<body>
	<main>

		<article>
            <img src = "{{ asset('cafeMenu/sandwich.jpg') }}" alt="Sandwich" class= "Sandwich">
			<h2>Sandwiches</h2>
		</article>

		<article>
            <img src = "{{ asset('cafeMenu/burgers.jpg') }}" alt="Burgers" class= "Burgers">
			<h2>Burgers</h2>
		</article>

		<article>
            <img src = "{{ asset('cafeMenu/wraps.jpg') }}" alt="Wraps" class= "Wraps">
            <h2>Wraps</h2>
        </article>

        <article>
            <img src = "{{ asset('cafeMenu/snacks.png') }}" alt="Snacks" class= "Snacks">
            <h2>Snacks</h2>
        </article>

        <article>
            <img src = "{{ asset('cafeMenu/western food.jpg') }}" alt="Western" class= "Western">
            <h2>Western Food</h2>
        </article>

        <article>
            <img src = "{{ asset('cafeMenu/fried rice.jpg') }}" alt="Rice" class= "Rice">
            <h2>Fried Rice</h2>
        </article>

        <article>
            <img src = "{{ asset('cafeMenu/noodles.jpg') }}" alt="Noodles" class= "Noodles">
            <h2>Noodles</h2>
        </article>

        <article>
            <img src = "{{ asset('cafeMenu/drinks.png') }}" alt="Drinks" class= "Drinks">
            <h2>Drinks</h2>
        </article>

	</main>
</body>
@endsection


@section('styles')
<style>
	header {
		background-color: #00c763;
		color: white;
		padding: 25px;
		text-align: center;
		font-size: 44px;
		position: absolute;
		width: 100%;
		top: 90px;
		font-family: 'Anuphan';
	}

	.navigation {
		background-color: #000000;
		color: white;
		overflow: hidden;
		display: flex;
		justify-content: space-around;
		align-items: center;
		position: absolute;
		top: 276px;
		left: 0;
		width: 100%;
	}

	.home{
		color: rgb(255, 255, 255);
		text-decoration: none;
		padding: 14px 16px;
		text-align: center;
		font-size: 18px;
		font-weight: bold;
		text-transform: uppercase;
	}
	.menu {
		color: rgb(255, 255, 255);
		text-decoration: none;
		padding: 14px 16px;
		text-align: center;
		font-size: 18px;
		font-weight: bold;
		text-transform: uppercase;
	}
	.navigation:hover {
		background-color: #00ff26;
	}
	
	main {
		margin: 40px;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-around;
		align-items: flex-start;
		margin-top: 125px;
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
@endsection
