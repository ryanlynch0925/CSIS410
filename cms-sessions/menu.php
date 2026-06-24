<div class="menu">
    <ul>
        <!-- Main Pages -->
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="mission.php">Mission</a></li>
        <li><a href="vision.php">Vision</a></li>
        <li><a href="beliefs.php">Beliefs</a></li>
        <li><a href="ministries.php">Ministries</a></li>
        <li><a href="missionaries.php">Missionaries</a></li>
        <li><a href="prayer.php">Prayer</a></li>
        <li><a href="donate.php">Donate</a></li>

        <!-- E-commerce Pages -->
        <li><a href="store.php">Store</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="checkout.php">Checkout</a></li>
        <!-- Form Pages -->
        <li><a href="contact.php">Contact</a></li>
        <li><a href="application.php">Mission Application</a></li>
        <!-- Account Pages -->
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>

        <?php
        if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
            echo "<li><a href=\"account.php\">My Account</a></li>";

            if (isset($_SESSION["role"]) && $_SESSION["role"] == "publisher") {
                echo "<li><a href=\"publisher.php\">Publisher</a></li>";
            }

            if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
                echo "<li><a href=\"publisher.php\">Publisher</a></li>";
                echo "<li><a href=\"admin.php\">Admin</a></li>";
            }
        }
        ?>
    </ul>
</div>