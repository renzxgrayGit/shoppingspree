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
			<a href="/items/cart">Cart(<?= $total_quantity ?>)</a>
		</header>
		<main>
			<div class="container">
				<div class="column">
					<img src="assets/tshirt.png" alt="tshirt">
					<h3>T-Shirt</h3>
					<h3>$1</h3>
					<form action="/items/add_item/1" method="post">	<!-- '1' is the item_id -->
						<input type="number" id="quantity" name="quantity" min="1" max="999" value="1">
						<input type="submit" value="Buy">
					</form>
				</div>
				<div class="column">
					<img src="assets/cap.png" alt="cap" id="cap-img">
					<div id="cap-box">
						<h3>Cap</h3>
						<h3>$2</h3>
						<form action="/items/add_item/2" method="post">
							<input type="number" id="quantity" name="quantity" min="1" max="999" value="1">
							<input type="submit" value="Buy">
						</form>
					</div>
				</div>
				<div class="column">
					<img src="assets/shorts.png" alt="shorts">
					<div id="shorts-box">
						<h3>Shorts</h3>
						<h3>$3</h3>
						<form action="/items/add_item/3" method="post">
							<input type="number" id="quantity" name="quantity" min="1" max="999" value="1">
							<input type="submit" value="Buy">
						</form>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
