<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Store - Grace Bridge Missions";
$pageDescription = "Christian product store for Grace Bridge Missions.";
$pageKeywords = "store, Christian products, missions, cart, Grace Bridge Missions";

$message = "";
$errorMessage = "";

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST["addToCart"])) {
    $productId = "";
    $quantity = "";

    if (isset($_POST["productId"])) {
        $productId = trim($_POST["productId"]);
    }

    if (isset($_POST["quantity"])) {
        $quantity = trim($_POST["quantity"]);
    }

    if (!numbersOnly($productId) || !isset($products[$productId])) {
        $errorMessage = "The selected product could not be found.";
    } elseif (!numbersOnly($quantity) || $quantity < 1) {
        $errorMessage = "Please enter a valid quantity.";
    } else {
        $productId = (int)$productId;
        $quantity = (int)$quantity;

        if (isset($_SESSION["cart"][$productId])) {
            $_SESSION["cart"][$productId] = $_SESSION["cart"][$productId] + $quantity;
        } else {
            $_SESSION["cart"][$productId] = $quantity;
        }

        $message = $products[$productId]["name"] . " was added to your cart.";
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
        Grace Bridge Missions. This page uses PHP arrays and sessions instead of a database.
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
        foreach ($products as $product) {
            echo "<div class=\"productCard\">";

            echo "<img src=\"" . cleanOutput($product["image"]) . "\" alt=\"" . cleanOutput($product["name"]) . "\" />";

            echo "<h3>" . cleanOutput($product["name"]) . "</h3>";

            echo "<p>" . cleanOutput($product["description"]) . "</p>";

            echo "<p class=\"price\">" . formatMoney($product["price"]) . "</p>";

            echo "<p><strong>Available Quantity:</strong> " . cleanOutput($product["quantity"]) . "</p>";

            echo "<form action=\"store.php\" method=\"post\">";
            echo "<p>";
            echo "<input type=\"hidden\" name=\"productId\" value=\"" . cleanOutput($product["id"]) . "\" />";
            echo "<label for=\"quantity" . cleanOutput($product["id"]) . "\">Quantity:</label>";
            echo "<input type=\"text\" name=\"quantity\" id=\"quantity" . cleanOutput($product["id"]) . "\" value=\"1\" />";
            echo "</p>";
            echo "<p>";
            echo "<input type=\"submit\" name=\"addToCart\" value=\"Add to Cart\" />";
            echo "</p>";
            echo "</form>";

            echo "</div>";
        }
        ?>
    </div>

    <div class="clear"></div>

        <p>
            <a href="cart.php">View Shopping Cart</a>
        </p>

        <p class="smallNote">
            Product images were created by ChatGPT for this project.
        </p>
    </div>
<?php
include("footer.php");
?>

        </div>
    </body>
</html>