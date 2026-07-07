<?php
$allowedRoles = array("admin");

include("session_check.php");
include("functions.php");
include("data.php");

$pageTitle = "Admin Dashboard - Grace Bridge Missions";
$pageDescription = "Administrator dashboard for Grace Bridge Missions CMS planning.";
$pageKeywords = "admin, dashboard, CMS, sessions, Grace Bridge Missions";

include("header.php");
include("menu.php");

$displayName = "Site Administrator";

if (isset($_SESSION["displayName"])) {
    $displayName = $_SESSION["displayName"];
}
?>

<div class="content">
    <h2>Admin Dashboard</h2>

    <div class="content">
        <p>
            Welcome, <strong><?php echo cleanOutput($displayName); ?></strong> . This dashboard is restricted to administrator accounts.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>CMS Administration Purpose</h3>

        <table>
            <tr>
                <th>Username</th>
                <th>Display Name</th>
                <th>Role</th>
            </tr>

            <?php
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . cleanOutput($user["username"]) . "</td>";
                echo "<td>" . cleanOutput($user["displayName"]) ."</td>";
                echo "<td>" . cleanOutput($user["role"]) ."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>Product Inventory Review</h3>

        <table>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>

            <?php
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>" . cleanOutput($product["id"]) ."</td>";
                echo "<td>" . cleanOutput($product["name"]) ."</td>";
                echo "<td>" . cleanOutput($product["price"]) ."</td>";
                echo "<td>" . cleanOutput($product["quantity"]) ."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>Ministry Content Areas</h3>

        <table>
            <tr>
                <th>Ministry</th>
                <th>Scripture</th>
            </tr>

            <?php
            foreach ($ministries as $ministry) {
                echo "<tr>";
                echo "<td>" . cleanOutput($ministry["name"]) ."</td>";
                echo "<td>" . cleanOutput($ministry["scripture"]) ."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>Futre Database CMS Planning</h3>

        <ul>
            <li>Create database tables for users, products, ministry pages, and orders.</li>
            <li>Move product information from PHP arrays into database records.</li>
            <li>Allow administrators to add, edit, and remove products.</li>
            <li>Allow publishers to manage ministry stories and prayer updates.</li>
            <li>Keep customer access separate from publisher and administrator access.</li>
        </ul>
    </div>

    <div class="dashboardBox">
        <h3>Christian Leadership Reminder</h3>

        <p>
            Administrators should manage the website with honesty, care, and service.
            The goal is not only to run a website, but to support ministry work that points
            people toward Christ.
        </p>

        <p>
            <em>"Moreover, it is required of stewards that they be found faithful."</em>
            1 Corinthians 4:2
        </p>
    </div>

    <p>
        <a href="account.php">Return to My Account</a>
    </p>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>