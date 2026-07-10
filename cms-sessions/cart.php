<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Shopping Cart - Grace Bridge Missions";
$pageDescription = "Shopping cart for Grace Bridge Missions Christian products.";
$pageKeywords = "shopping cart, products, database, Grace Bridge Missions";

$message = "";
$errorMessage = "";

$isLoggedIn = false;
$userId = 0;

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true && isset($_SESSION["user_id"])) {
    $isLoggedIn = true;
    $userId = (int)$_SESSION["user_id"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !$isLoggedIn) {
    $errorMessage = "Please log in before managing your shopping cart.";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateCart"])) {
    if (isset($_POST["quantities"]) && is_array($_POST["quantities"])) {
        foreach ($_POST["quantities"] as $productId => $quantity) {
            $productId = trim($productId);
            $quantity = trim($quantity);

            if (numbersOnly($productId) && numbersOnly($quantity)) {
                $productId = (int)$productId;
                $quantity = (int)$quantity;

                if ($quantity > 0) {
                    $stockStatement = $pdo->prepare("
                        SELECT stock_quantity
                        FROM products
                        WHERE id = :product_id
                        AND status = 'active'
                        LIMIT 1
                    ");

                    $stockStatement->execute([
                        ":product_id" => $productId
                    ]);

                    $productStock = $stockStatement->fetch();

                    if ($productStock && $quantity <= $productStock["stock_quantity"]) {
                        $updateStatement = $pdo->prepare("
                            UPDATE cart_items
                            SET quantity = :quantity,
                                updated_at = CURRENT_TIMESTAMP
                            WHERE user_id = :user_id
                            AND product_id = :product_id
                        ");

                        $updateStatement->execute([
                            ":quantity" => $quantity,
                            ":user_id" => $userId,
                            ":product_id" => $productId
                        ]);
                    } else {
                        $errorMessage = "One or more quantities were higher than the available stock.";
                    }
                } else {
                    $deleteStatement = $pdo->prepare("
                        DELETE FROM cart_items
                        WHERE user_id = :user_id
                        AND product_id = :product_id
                    ");

                    $deleteStatement->execute([
                        ":user_id" => $userId,
                        ":product_id" => $productId
                    ]);
                }
            }
        }

        if ($errorMessage == "") {
            $message = "Your cart has been updated.";
        }
    }
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["removeItem"])) {
    $removeId = trim($_POST["removeItem"]);

    if (numbersOnly($removeId)) {
        $removeId = (int)$removeId;

        $deleteStatement = $pdo->prepare("
            DELETE FROM cart_items
            WHERE user_id = :user_id
            AND product_id = :product_id
        ");

        $deleteStatement->execute([
            ":user_id" => $userId,
            ":product_id" => $removeId
        ]);

        $message = "The item was removed from your cart.";
    } else {
        $errorMessage = "The selected item could not be removed.";
    }
}

elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emptyCart"])) {
    $emptyStatement = $pdo->prepare("
        DELETE FROM cart_items
        WHERE user_id = :user_id
    ");

    $emptyStatement->execute([
        ":user_id" => $userId
    ]);

    $message = "Your cart has been emptied.";
}

$cartItems = array();
$subtotal = 0.00;
$tax = 0.00;
$total = 0.00;

if ($isLoggedIn) {
    $cartStatement = $pdo->prepare("
        SELECT
            cart_items.product_id,
            cart_items.quantity,
            products.product_name,
            products.price,
            products.stock_quantity
        FROM cart_items
        INNER JOIN products ON cart_items.product_id = products.id
        WHERE cart_items.user_id = :user_id
        ORDER BY products.product_name
    ");

    $cartStatement->execute([
        ":user_id" => $userId
    ]);

    $cartItems = $cartStatement->fetchAll();

    foreach ($cartItems as $item) {
        $subtotal = $subtotal + ($item["price"] * $item["quantity"]);
    }

    $tax = calculateTax($subtotal);
    $total = $subtotal + $tax;
}

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Shopping Cart</h2>

    <p>
        Review the Christian products you have selected from the Grace Bridge Missions store.
        You can update quantities, remove items, or continue to checkout.
    </p>

    <?php
    if ($message != "") {
        echo "<div class=\"success\"><p>" . cleanOutput($message) . "</p></div>";
    }

    if ($errorMessage != "") {
        echo "<div class=\"error\"><p>" . cleanOutput($errorMessage) . "</p></div>";
    }
    ?>

    <?php
    if (!$isLoggedIn) {
    ?>
        <div class="noticeBox">
            <p>You must log in before using the shopping cart.</p>
            <p><a href="login.php">Log In</a></p>
        </div>
    <?php
    } elseif (count($cartItems) == 0) {
    ?>
        <div class="noticeBox">
            <p>Your shopping cart is currently empty.</p>
            <p><a href="store.php">Return to the Store</a></p>
        </div>
    <?php
    } else {
    ?>

        <form action="cart.php" method="post">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Item Total</th>
                    <th>Remove</th>
                </tr>

                <?php
                foreach ($cartItems as $item) {
                    $itemTotal = $item["price"] * $item["quantity"];

                    echo "<tr>";
                    echo "<td>" . cleanOutput($item["product_name"]) . "</td>";
                    echo "<td>" . formatMoney($item["price"]) . "</td>";
                    echo "<td>";
                    echo "<input type=\"text\" name=\"quantities[" . cleanOutput($item["product_id"]) . "]\" value=\"" . cleanOutput($item["quantity"]) . "\" />";
                    echo "</td>";
                    echo "<td>" . formatMoney($itemTotal) . "</td>";
                    echo "<td>";
                    echo "<button type=\"submit\" name=\"removeItem\" value=\"" . cleanOutput($item["product_id"]) . "\">Remove</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>

                <tr>
                    <td colspan="3"><strong>Subtotal</strong></td>
                    <td colspan="2"><?php echo formatMoney($subtotal); ?></td>
                </tr>

                <tr>
                    <td colspan="3"><strong>Estimated Tax</strong></td>
                    <td colspan="2"><?php echo formatMoney($tax); ?></td>
                </tr>

                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td colspan="2"><?php echo formatMoney($total); ?></td>
                </tr>
            </table>

            <p>
                <input type="submit" name="updateCart" value="Update Cart" />
                <input type="submit" name="emptyCart" value="Empty Cart" />
            </p>
        </form>

        <p>
            <a href="store.php">Continue Shopping</a>
            <a href="checkout.php">Proceed to Checkout</a>
        </p>

    <?php
    }
    ?>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>