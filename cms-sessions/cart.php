<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Shopping Cart - Grace Bridge Missions";
$pageDescription = "Shopping cart for Grace Bridge Missions Christian products.";
$pageKeywords = "shopping cart, products, sessions, Grace Bridge Missions";

$message = "";
$errorMessage = "";

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateCart"])) {
    if (isset($_POST["quantities"]) && is_array($_POST["quantities"])) {
        foreach ($_POST["quantities"] as $productId => $quantity) {
            $productId = trim($productId);
            $quantity = trim($quantity);

            if (numbersOnly($productId) && isset($products[$productId])) {
                if (numbersOnly($quantity)) {
                    $productId = (int)$productId;
                    $quantity = (int)$quantity;

                    if ($quantity > 0) {
                        $_SESSION["cart"][$productId] = $quantity;
                    } else {
                        unset($_SESSION["cart"][$productId]);
                    }
                }
            }
        }

        $message = "Your cart has been updated.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset($_POST["removeItem"])) {
    $removeId = trim($_POST["removeItem"]);

    if (numbersOnly($removeId) && isset($_SESSION["cart"][$removeId])) {
        unset($_SESSION["cart"][$removeId]);
        $message = "The item was removed from your cart.";
    } else {
        $errorMessage = "The selected item could not be removed.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"&& isset($_POST["emptyCart"])) {
    $_SESSION["cart"] = array();
    $message = "Your cart has been emptied.";
}

$cart = $_SESSION["cart"];
$subtotal = calculateCartSubtotal($cart, $products);
$tax = calculateTax($subtotal);
$total = calculateCartTotal($subtotal, $tax);

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
    if (count($cart) == 0) {
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
                foreach ($cart as $productId => $quantity) {
                    if (isset($products[$productId])) {
                        $product = $products[$productId];
                        $itemTotal = $product["price"] * $quantity;

                        echo "<tr>";
                        echo "<td>" . cleanOutput($product["name"]) . "</td>";
                        echo "<td>" . formatMoney($product["price"]) . "</td>";
                        echo "<td>";
                        echo "<input type=\"text\" name=\"quantities[" . cleanOutput($productId) . "]\" value=\"" . cleanOutput($quantity) . "\" />";
                        echo "</td>";
                        echo "<td>" . formatMoney($itemTotal) . "</td>";
                        echo "<td>";
                        echo "<button type=\"submit\" name=\"removeItem\" value=\"" . cleanOutput($productId) . "\">Remove</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
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