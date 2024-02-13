<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/cartt.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
        <title>Carts Page</title>
    </head>
    <body>
        <header>
            <a href="/items/go_back" id="my_store">My Store</a>
            <a href="/items/go_back" id="go_back">Catalog</a>
        </header>
        <main>
            <h2>Checkout</h2>
            <table>
			<h3>Total: $<?= number_format($total_price, 2) ?></h3>
                <tr>
                    <th>Item name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
<?php           foreach ($cart_contents as $item)
                {   ?>
                    <tr>
                    <td><?= $item['item_name'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>$<?= $item['price'] ?></td>
                    <td>
                        <form action="/items/remove_item/<?= $item['cart_id'] ?>" method="post">
                            <input type="submit" value="Remove" id="delete-button">    
                        </form>
                    </td>
                </tr>
<?php           }    ?>
            </table>
        </main>
    </body>
</html>