@extends('layouts.main')

@section('content')

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

<body>
	<header>
		<h1>Food Canteen</h1>
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
            <p>Price : RM 0</p>
        </article>

</main>
@endsection
