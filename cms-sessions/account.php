<?php
include("session_check.php");
include("functions.php");

$pageTitle = "My Account - Grace Bridge Missions";
$pageDescription = "Account page for logged-in Grace Bridge Missions users.";
$pageKeywords = "account, customer, sessions, Grace Bridge Missions";

include("header.php");
include("menu.php");

$displayName = "Mission Supporter";
$username = "";
$role = "";

if (isset($_SESSION["displayName"])) {
    $displayName = $_SESSION["displayName"];
}

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
}

if (isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
}
?>

<div class="content">
    <h2>My Account</h2>

    <div class="noticeBox">
        <p>
            Welcome, <strong><?php echo cleanOutput($displayName); ?></strong> . This account area is protected by PHP sessions.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Account Information</h3>

        <p>
            <strong>Username:</strong>
            <?php echo cleanOutput($username); ?>
        </p>

        <p>
            <strong>Access Level:</strong>
            <?php echo cleanOutput($role); ?>
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Customer Options</h3>

        <p>
            As a Grace Bridge Missions supporter, you can browse Christian products, review your cart, and continue through checkout.
        </p>

        <p>
            <a href="store.php">Visit Store</a>
            <a href="cart.php">View Cart</a>
            <a href="checkout.php">Checkout</a>
        </p>
    </div>

    <?php
    if ($role == "publisher" || $role == "admin") {
    ?>
        <div class="dashboardBox">
            <h3>Publisher Options</h3>

            <p>
                Publishers can review ministry content and prepare updates for the mission organization.
                In the final CMS project, this area can connect to datebase-managed content.
            </p>

            <p>
                <a href="publisher.php">Go to Publisher Dashboard</a>
            </p>
        </div>
    <?php
    }
    ?>

    <?php
    if ($role == "admin") {
    ?>
        <div class="dashboardBox">
            <h3>Administrator Options</h3>

            <p>
                Administrators can review account roles, product information, and CMS planning areas.
                In the final CMS project, this area can manage database records.
            </p>

            <p>
                <a href="admin.php">Go to Admin Dashboard</a>
            </p>
        </div>
    <?php
    }
    ?>

    <div class="dashboardBox">
        <h3>Faith and Misison Reminder</h3>

        <p>
            Grace Bridge Missions exists to serve others in the name of Jesus Christ.
            Every account, product, and ministry resource should support the larger goal of sharing the gospel through love, service, and discipleship.
        </p>

        <p>
            <em>"Whatever you do, work heartily, as for the Lord and not for men."</em>
            Colossians 3:23
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>