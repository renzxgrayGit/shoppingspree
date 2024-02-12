<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/assets/catalog.css">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
		<title>Catalog Page</title>
	</head>
	<body>
		<header>
			<h1>My Store</h1>
			<a href="/items/cart">Cart(3)</a>
		</header>
		<main>
			<div class="container">
				<div class="column">
					<img src="assets/tshirt.png" alt="tshirt">
					<h3>T-Shirt</h3>
					<h3>$1</h3>
					<form action="/items/add_item" method="post">
						<label for="quantity"></label>
						<input type="hidden" name="item_id" value="1">
						<input type="number" id="quantity" name="quantity" min="1" max="999" value="1">
						<input type="submit" value="Buy">
					</form>
				</div>
				<div class="column">
					<img src="assets/cap.png" alt="cap">
					<h3>Cap</h3>
					<h3>$2</h3>
					<form action="/items/add_item" method="post">
						<label for="quantity"></label>
						<input type="hidden" name="item_id" value="2">
						<input type="number" id="quantity" name="quantity" min="1" max="999" value="1">
						<input type="submit" value="Buy">
					</form>
				</div>
				<div class="column">
					<img src="assets/shorts.png" alt="shorts">
					<h3>Shorts</h3>
					<h3>$3</h3>
					<form action="/items/add_item" method="post">
						<label for="quantity"></label>
						<input type="hidden" name="item_id" value="3">
						<input type="number" id="quantity" name="quantity" min="1" max="999" value="1">
						<input type="submit" value="Buy">
					</form>
				</div>
			</div>
		</main>
	</body>
</html>
