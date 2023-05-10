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
    
        <!-- <nav class="navigation">
            <a class= "home" href="#">Home</a>
            <a class= "menu" href="#">Menu</a>  
        </nav> -->

        <main>

            <section>
                <h2 class="about">About Us</h2>
				<div class="line"></div>
                <p1>We are Inti Canteen that provides a wide range of delicious and affordable meals for our customers. Our menu consists of a variety of local and international dishes, prepared by our experienced chefs.</p1>
            </section>
    
            <section>
                <h2 class="menu">Menu</h2>
				<div class="line2"></div>
                <p2>Check out our menu and order online:</p2>
                <!-- <ul>
                    <li><a href="/sandwich">Sandwiches</a></li>
                    <li><a href="/burger">Burgers</a></li>
                    <li><a href="/wrap">Wraps</a></li>
                    <li><a href="/snack">Snacks</a></li>
                    <li><a href="/western">Western Food</a></li>
                    <li><a href="/rice">Fried Rice</a></li>
                    <li><a href="/noodles">Noodles</a></li>
					<li><a href="/drink">Drinks</a></li>
                </ul> -->
            </section>
    
            <!-- <section>
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
            </section> -->
        </main>
</body>

<!--2 // MENU SECTION -->

<!-- To include the header -->
<body>
	<main>
		<article>
			<a href="{{ url('/sandwich') }}" style="text-decoration: none; color:#000000">
            <img src = "{{ asset('cafeMenu/sandwich.jpg') }}" alt="Sandwich" class= "Sandwich">
			<h2>Sandwiches</h2>
			</a>
		</article>

		<article>
			<a href="{{ url('/burger') }}" style="text-decoration: none; color:#000000">
            <img src = "{{ asset('cafeMenu/burgers.jpg') }}" alt="Burgers" class= "Burgers">
			<h2>Burgers</h2>
			</a>
		</article>

		<article>
			<a href="{{ url('/wrap') }}" style="text-decoration: none; color:#000000">
            <img src = "{{ asset('cafeMenu/wraps.jpg') }}" alt="Wraps" class= "Wraps">
            <h2>Wraps</h2>
			</a>
        </article>

        <article>
			<a href="{{ url('/snack') }}" style="text-decoration: none; color:#000000">
            <img src = "{{ asset('cafeMenu/snacks.png') }}" alt="Snacks" class= "Snacks">
            <h2>Snacks</h2>
			</a>
        </article>

        <article>
			<a href="{{ url('/western') }}" style="text-decoration: none; color:#000000">
            <img src = "{{ asset('cafeMenu/western food.jpg') }}" alt="Western" class= "Western">
            <h2>Western Food</h2>
			</a>
        </article>

        <article>
			<a href="{{ url('/rice') }}" style="text-decoration: none; color:#000000">
            <img src = "{{ asset('cafeMenu/fried rice.jpg') }}" alt="Rice" class= "Rice">
            <h2>Fried Rice</h2>
			</a>
        </article>

        <article>
			<a href="{{ url('/noodles') }}" style="text-decoration: none; color:#000000">
            <img src = "{{ asset('cafeMenu/noodles.jpg') }}" alt="Noodles" class= "Noodles">
            <h2>Noodles</h2>
			</a>
        </article>

        <article>
			<a href="{{ url('/drink') }}" style="text-decoration: none; color:#000000">
            <img src = "{{ asset('cafeMenu/drinks.png') }}" alt="Drinks" class= "Drinks">
            <h2>Drinks</h2>
			</a>
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

	.menu {
		color: #000000;
		text-decoration: none;
		padding: 14px 16px;
		text-align: center;
		font-size: 18px;
		position: absolute;
		font-family: 'Kopi Senja Sans';
		font-size: 35px;
		right: 790px;
		top: 400px;
	}
	.navigation:hover {
		background-color: #00ff26;
	}
	
	main {
		margin: 100px;
		display: flex;
		flex-wrap: wrap;
		justify-content: space-around;
		align-items: flex-start;
		margin-top: 110px;
	}

	.about{
		color: #000000;
		position: absolute;
		font-family: 'Kopi Senja Sans';
		font-size: 35px;
		right: 780px;
		top: 300px;
		
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
	.line {
        position: absolute;
        width: 250px;
        height: 0px;
        left: 760px;
        top: 350px;

        border: 2px solid red;
    }

	.line2 {
		position: absolute;
		width: 250px;
		height: 0px;
		left: 760px;
		top: 465px;

		border: 2px solid red;
	}

	p1{
		position: absolute;
		font-family: 'Anuphan';
		font-size: 16px;
		right: 150px;
    	top: 360px;
		text-align: center;
	}

	p2{
		position: absolute;
		font-family: 'Anuphan';
		font-weight:bold;
		font-size: 18px;
		right: 690px;
		top: 475px;
		text-align: center;
	}

</style>
@endsection
