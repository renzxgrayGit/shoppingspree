<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/cart.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
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
            <h4>Billing info</h4>
            <form action="/items/submit_order/" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name">
                <label for="address">Address:</label>
                <input type="text" name="address">
                <label for="card_number">Card Number:</label>
                <input type="text" name="card_number">
                <input type="submit" value="Submit Order">
            </form>
            <!-- new added -->
<?php       if(isset($success_order))
            {   ?>
                <p> <?= htmlspecialchars($success_order, ENT_QUOTES, 'UTF-8') ?></p>
<?php       }   ?>
        </main>
    </body>
</html>