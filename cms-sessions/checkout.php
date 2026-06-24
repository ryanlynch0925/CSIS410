<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Checkout - Grace Bridge Missions";
$pageDescription = "Checkout total page for Grace Bridge Missions Christian products.";
$pageKeywords = "checkout, cart total, tax, sessions, Grace Bridge Missions";

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

$cart = $_SESSION["cart"];
$subtotal = calculateCartSubtotal($cart, $products);
$tax = calculateTax($subtotal);
$total = calculateCartTotal($subtotal, $tax);

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Checkout</h2>

    <p>
        Review your order total before completing checkout. This practice checkout process
        stops after calculating the subtotal, estimated tax, and final total.
    </p>

    <?php
    if (count($cart) == 0) {
    ?>
        <div class="noticeBox">
            <p>Your shopping cart is empty. Please add products before checking out.</p>
            <p><a href="store.php">Return to the Store</a></p>
        </div>
    <?php
    } else {
    ?>

        <div class="noticeBox">
            <p>
                Thank you for supporting Grace Bridge Missions. Your purchase helps support
                Christian outreach, discipleship resources, and mission-focused ministry work.
            </p>
        </div>

        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Item Total</th>
            </tr>

            <?php
            foreach ($cart as $productId => $quantity) {
                if (isset($products[$productId])) {
                    $product = $products[$productId];
                    $itemTotal = $product["price"] * $quantity;

                    echo "<tr>";
                    echo "<td>" . cleanOutput($product["name"]) . "</td>";
                    echo "<td>" . formatMoney($product["price"]) . "</td>";
                    echo "<td>" . cleanOutput($quantity) . "</td>";
                    echo "<td>" . formatMoney($itemTotal) . "</td>";
                    echo "</tr>";
                }
            }
            ?>

            <tr>
                <td colspan="3"><strong>Subtotal</strong></td>
                <td><?php echo formatMoney($subtotal); ?></td>
            </tr>

            <tr>
                <td colspan="3"><strong>Estimated Tax</strong></td>
                <td><?php echo formatMoney($tax); ?></td>
            </tr>

            <tr>
                <td colspan="3"><strong>Final Total</strong></td>
                <td><strong><?php echo formatMoney($total); ?></strong></td>
            </tr>
        </table>

        <div class="success">
            <p>
                Checkout total calculated successfully. This assignment does not require
                real payment processing, so the process stops here.
            </p>
        </div>

        <p>
            <a href="cart.php">Return to Cart</a> |
            <a href="store.php">Continue Shopping</a>
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