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
            </section>

        </main>
</body>

<!--2 // MENU SECTION -->

<!-- To include the header -->
<body>
	<main>
	@foreach ($categoryGroups as $categoryGroup)
		@foreach ($categoryGroup as $category)
			<article>
				<a href="{{ url('/' . strtolower($category->category)) }}" style="text-decoration: none; color:#000000">
					<img src="{{ asset('cafeMenu/' . $category->catpic) }}" alt="{{ $category->category }}" class="category-image">
					<h2>{{ $category->category }}</h2>
				</a>
			</article>
		@endforeach
	@endforeach

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
