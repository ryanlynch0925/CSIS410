<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Checkout - Grace Bridge Missions";
$pageDescription = "Checkout page for Grace Bridge Missions Christian products.";
$pageKeywords = "checkout, cart total, tax, database, Grace Bridge Missions";

$message = "";
$errorMessage = "";
$orderPlaced = false;
$orderId = 0;

$isLoggedIn = false;
$userId = 0;

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true && isset($_SESSION["user_id"])) {
    $isLoggedIn = true;
    $userId = (int)$_SESSION["user_id"];
}

$cartItems = array();
$subtotal = 0.00;
$tax = 0.00;
$total = 0.00;
$currentUser = null;

if ($isLoggedIn) {
    $userStatement = $pdo->prepare("
        SELECT
            id,
            first_name,
            last_name,
            email
        FROM users
        WHERE id = :id
        LIMIT 1
    ");

    $userStatement->execute([
        ":id" => $userId
    ]);

    $currentUser = $userStatement->fetch();

    $cartStatement = $pdo->prepare("
        SELECT
            cart_items.product_id,
            cart_items.quantity,
            products.product_name,
            products.sku,
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["placeOrder"])) {
    if (!$isLoggedIn) {
        $errorMessage = "Please log in before checking out.";
    } elseif (count($cartItems) == 0) {
        $errorMessage = "Your shopping cart is empty.";
    } else {
        $firstName = trim($_POST["firstName"] ?? "");
        $lastName = trim($_POST["lastName"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $billingAddress = trim($_POST["billingAddress"] ?? "");
        $billingCity = trim($_POST["billingCity"] ?? "");
        $billingState = trim($_POST["billingState"] ?? "");
        $billingZipCode = trim($_POST["billingZipCode"] ?? "");

        if ($firstName == "" || $lastName == "" || $email == "") {
            $errorMessage = "Please complete your name and email before placing the order.";
        } else {
            try {
                $pdo->beginTransaction();

                foreach ($cartItems as $item) {
                    if ($item["quantity"] > $item["stock_quantity"]) {
                        throw new Exception("One or more products do not have enough stock available.");
                    }
                }

                $orderStatement = $pdo->prepare("
                    INSERT INTO orders (
                        user_id,
                        subtotal,
                        tax_amount,
                        total_amount,
                        order_status,
                        customer_first_name,
                        customer_last_name,
                        customer_email,
                        billing_address,
                        billing_city,
                        billing_state,
                        billing_zip_code
                    )
                    VALUES (
                        :user_id,
                        :subtotal,
                        :tax_amount,
                        :total_amount,
                        'pending',
                        :customer_first_name,
                        :customer_last_name,
                        :customer_email,
                        :billing_address,
                        :billing_city,
                        :billing_state,
                        :billing_zip_code
                    )
                ");

                $orderStatement->execute([
                    ":user_id" => $userId,
                    ":subtotal" => $subtotal,
                    ":tax_amount" => $tax,
                    ":total_amount" => $total,
                    ":customer_first_name" => $firstName,
                    ":customer_last_name" => $lastName,
                    ":customer_email" => $email,
                    ":billing_address" => $billingAddress,
                    ":billing_city" => $billingCity,
                    ":billing_state" => $billingState,
                    ":billing_zip_code" => $billingZipCode
                ]);

                $orderId = $pdo->lastInsertId();

                $itemStatement = $pdo->prepare("
                    INSERT INTO order_items (
                        order_id,
                        product_id,
                        product_name,
                        product_sku,
                        quantity,
                        unit_price,
                        line_total
                    )
                    VALUES (
                        :order_id,
                        :product_id,
                        :product_name,
                        :product_sku,
                        :quantity,
                        :unit_price,
                        :line_total
                    )
                ");

                $stockStatement = $pdo->prepare("
                    UPDATE products
                    SET stock_quantity = stock_quantity - :quantity
                    WHERE id = :product_id
                ");

                foreach ($cartItems as $item) {
                    $lineTotal = $item["price"] * $item["quantity"];

                    $itemStatement->execute([
                        ":order_id" => $orderId,
                        ":product_id" => $item["product_id"],
                        ":product_name" => $item["product_name"],
                        ":product_sku" => $item["sku"],
                        ":quantity" => $item["quantity"],
                        ":unit_price" => $item["price"],
                        ":line_total" => $lineTotal
                    ]);

                    $stockStatement->execute([
                        ":quantity" => $item["quantity"],
                        ":product_id" => $item["product_id"]
                    ]);
                }

                $clearCartStatement = $pdo->prepare("
                    DELETE FROM cart_items
                    WHERE user_id = :user_id
                ");

                $clearCartStatement->execute([
                    ":user_id" => $userId
                ]);

                $pdo->commit();

                $orderPlaced = true;
                $message = "Your order has been placed successfully. Order number: " . $orderId;

                $cartItems = array();
            } catch (Exception $e) {
                $pdo->rollBack();
                $errorMessage = "Checkout could not be completed. " . $e->getMessage();
            }
        }
    }
}

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Checkout</h2>

    <p>
        Review your order total before completing checkout. This checkout process stores the order
        in the database and clears the customer's shopping cart.
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
            <p>You must log in before checking out.</p>
            <p><a href="login.php">Log In</a></p>
        </div>
    <?php
    } elseif ($orderPlaced) {
    ?>
        <div class="noticeBox">
            <p>
                Thank you for supporting Grace Bridge Missions. Your order has been saved in the database.
            </p>
            <p>
                <a href="store.php">Return to Store</a>
            </p>
        </div>
    <?php
    } elseif (count($cartItems) == 0) {
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
            foreach ($cartItems as $item) {
                $itemTotal = $item["price"] * $item["quantity"];

                echo "<tr>";
                echo "<td>" . cleanOutput($item["product_name"]) . "</td>";
                echo "<td>" . formatMoney($item["price"]) . "</td>";
                echo "<td>" . cleanOutput($item["quantity"]) . "</td>";
                echo "<td>" . formatMoney($itemTotal) . "</td>";
                echo "</tr>";
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

        <div class="dashboardBox">
            <h3>Customer Information</h3>

            <form action="checkout.php" method="post">
                <p>
                    <label for="firstName">First Name:</label>
                    <input type="text" name="firstName" id="firstName"
                        value="<?php echo cleanOutput($currentUser["first_name"] ?? ""); ?>" required />
                </p>

                <p>
                    <label for="lastName">Last Name:</label>
                    <input type="text" name="lastName" id="lastName"
                        value="<?php echo cleanOutput($currentUser["last_name"] ?? ""); ?>" required />
                </p>

                <p>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email"
                        value="<?php echo cleanOutput($currentUser["email"] ?? ""); ?>" required />
                </p>

                <p>
                    <label for="billingAddress">Billing Address:</label>
                    <input type="text" name="billingAddress" id="billingAddress" />
                </p>

                <p>
                    <label for="billingCity">Billing City:</label>
                    <input type="text" name="billingCity" id="billingCity" />
                </p>

                <p>
                    <label for="billingState">Billing State:</label>
                    <input type="text" name="billingState" id="billingState" />
                </p>

                <p>
                    <label for="billingZipCode">Billing Zip Code:</label>
                    <input type="text" name="billingZipCode" id="billingZipCode" />
                </p>

                <p>
                    <input type="submit" name="placeOrder" value="Place Order" />
                </p>
            </form>
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