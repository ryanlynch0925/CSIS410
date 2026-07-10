<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Store - Grace Bridge Missions";
$pageDescription = "Christian product store for Grace Bridge Missions.";
$pageKeywords = "store, Christian products, missions, cart, database, Grace Bridge Missions";

$message = "";
$errorMessage = "";
$products = array();

$productStatement = $pdo->query("
    SELECT
        id,
        product_name,
        product_slug,
        product_description,
        sku,
        price,
        stock_quantity,
        image_url,
        category,
        status
    FROM products
    WHERE status = 'active'
    ORDER BY product_name
");

$products = $productStatement->fetchAll();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addToCart"])) {
    $productId = "";
    $quantity = "";

    if (isset($_POST["productId"])) {
        $productId = trim($_POST["productId"]);
    }

    if (isset($_POST["quantity"])) {
        $quantity = trim($_POST["quantity"]);
    }

    if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
        $errorMessage = "Please log in as a customer before adding products to your cart.";
    } elseif (!isset($_SESSION["user_id"])) {
        $errorMessage = "Your account session could not be verified. Please log in again.";
    } elseif (!numbersOnly($productId)) {
        $errorMessage = "The selected product could not be found.";
    } elseif (!numbersOnly($quantity) || $quantity < 1) {
        $errorMessage = "Please enter a valid quantity.";
    } else {
        $productId = (int)$productId;
        $quantity = (int)$quantity;
        $userId = (int)$_SESSION["user_id"];

        $checkProduct = $pdo->prepare("
            SELECT
                id,
                product_name,
                stock_quantity
            FROM products
            WHERE id = :id
            AND status = 'active'
            LIMIT 1
        ");

        $checkProduct->execute([
            ":id" => $productId
        ]);

        $product = $checkProduct->fetch();

        if (!$product) {
            $errorMessage = "The selected product could not be found.";
        } elseif ($quantity > $product["stock_quantity"]) {
            $errorMessage = "The requested quantity is not available.";
        } else {
            $cartStatement = $pdo->prepare("
                INSERT INTO cart_items (
                    user_id,
                    product_id,
                    quantity
                )
                VALUES (
                    :user_id,
                    :product_id,
                    :quantity
                )
                ON DUPLICATE KEY UPDATE
                    quantity = quantity + VALUES(quantity),
                    updated_at = CURRENT_TIMESTAMP
            ");

            $cartStatement->execute([
                ":user_id" => $userId,
                ":product_id" => $productId,
                ":quantity" => $quantity
            ]);

            $message = $product["product_name"] . " was added to your cart.";
        }
    }
}

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Grace Bridge Missions Store</h2>

    <p>
        <strong>Store Purpose:</strong>
        Purchases from this practice store support the fictional mission work of
        Grace Bridge Missions. Products are now loaded from the database, and cart items
        are saved to the customer account.
    </p>

    <?php
    if ($message != "") {
        echo "<div class=\"success\"><p>" . cleanOutput($message) . "</p></div>";
    }

    if ($errorMessage != "") {
        echo "<div class=\"error\"><p>" . cleanOutput($errorMessage) . "</p></div>";
    }
    ?>

    <div class="productGrid">
        <?php
        if (count($products) > 0) {
            foreach ($products as $product) {
                echo "<div class=\"productCard\">";

                if ($product["image_url"] != "") {
                    echo "<img src=\"" . cleanOutput($product["image_url"]) . "\" alt=\"" . cleanOutput($product["product_name"]) . "\" />";
                }

                echo "<h3>" . cleanOutput($product["product_name"]) . "</h3>";

                echo "<p>" . cleanOutput($product["product_description"]) . "</p>";

                echo "<p><strong>Category:</strong> " . cleanOutput($product["category"]) . "</p>";

                echo "<p class=\"price\">" . formatMoney($product["price"]) . "</p>";

                echo "<p><strong>Available Quantity:</strong> " . cleanOutput($product["stock_quantity"]) . "</p>";

                echo "<form action=\"store.php\" method=\"post\">";
                echo "<p>";
                echo "<input type=\"hidden\" name=\"productId\" value=\"" . cleanOutput($product["id"]) . "\" />";
                echo "<label for=\"quantity" . cleanOutput($product["id"]) . "\">Quantity:</label>";
                echo "<input type=\"text\" name=\"quantity\" id=\"quantity" . cleanOutput($product["id"]) . "\" value=\"1\" required />";
                echo "</p>";
                echo "<p>";
                echo "<input type=\"submit\" name=\"addToCart\" value=\"Add to Cart\" />";
                echo "</p>";
                echo "</form>";

                echo "</div>";
            }
        } else {
            echo "<p>No products are available at this time.</p>";
        }
        ?>
    </div>

    <div class="clear"></div>

    <p>
        <a href="cart.php">View Shopping Cart</a>
    </p>

    <p class="smallNote">
        Products are stored in the database for the Grace Bridge Missions CMS project.
    </p>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>