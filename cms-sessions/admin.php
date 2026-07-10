<?php
$allowedRoles = array("administrator");

include("session_check.php");
include("functions.php");
include("data.php");

$pageTitle = "Admin Dashboard - Grace Bridge Missions";
$pageDescription = "Administrator dashboard for Grace Bridge Missions CMS planning.";
$pageKeywords = "administrator, dashboard, CMS, sessions, Grace Bridge Missions";

$displayName = "Site Administrator";

if (isset($_SESSION["displayName"])) {
    $displayName = $_SESSION["displayName"];
}

$users = array();
$products = array();
$ministries = array();

$userStatement = $pdo->query("
    SELECT
        id, first_name, last_name, username, email, role, last_login_at
    FROM users
    ORDER BY role, username
");
$users = $userStatement->fetchAll();

$productStatement = $pdo->query("
    SELECT
        id, product_name, price, stock_quantity, status
    FROM products
    ORDER BY product_name
");
$products = $productStatement->fetchAll();

$ministryStatement = $pdo->query("
    SELECT
        id,
        ministry_name,
        ministry_description,
        scripture,
        is_active
    FROM ministries
    ORDER BY ministry_name
");
$ministries = $ministryStatement->fetchAll();

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Admin Dashboard</h2>
        <p>
            Welcome, <strong><?php echo cleanOutput($displayName); ?></strong> . This dashboard is restricted to administrator accounts.
        </p>

        <p>
            <a href="admin_content.php">Manage Website Content</a> |
            <a href="admin_users.php">Manage Users</a>
        </p>

    <div class="dashboardBox">
        <h3>User Account Review</h3>

        <table>
            <tr>
                <th>Username</th>
                <th>Display Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Last Login</th>
            </tr>

            <?php
            if (count($users) > 0) {
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . cleanOutput($user["username"]) . "</td>";
                    echo "<td>" . cleanOutput($user["first_name"]) . " " . cleanOutput($user["last_name"]) . "</td>";
                    echo "<td>" . cleanOutput($user["email"]) . "</td>";
                    echo "<td>" . cleanOutput($user["role"]) . "</td>";

                    if ($user["last_login_at"] != "") {
                        echo "<td>" . cleanOutput($user["last_login_at"]) . "</td>";
                    } else {
                        echo "<td>Not logged in yet</td>";
                    }

                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='5'>No users found.</td>";
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
                <th>Status</th>
            </tr>

            <?php
            if (count($products) > 0) {
                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>" . cleanOutput($product["id"]) ."</td>";
                    echo "<td>" . cleanOutput($product["product_name"]) ."</td>";
                    echo "<td>" . cleanOutput($product["price"]) ."</td>";
                    echo "<td>" . cleanOutput($product["stock_quantity"]) ."</td>";
                    echo "<td>". cleanOutput($product["status"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='5'>No products found.</td>";
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
            if (count($ministries) > 0) {
                foreach ($ministries as $ministry) {
                    echo "<tr>";
                    echo "<td>" . cleanOutput($ministry["ministry_name"]) ."</td>";
                    echo "<td>" . cleanOutput($ministry["scripture"]) ."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='2'>No ministries found.</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>Database CMS Progress</h3>

        <ul>
            <li>User accounts are now stored in the database.</li>
            <li>Product information is now stored in the database.</li>
            <li>Ministry information is now stored in the database.</li>
            <li>Cart, orders, and order items have database tables ready for checkout.</li>
            <li>Allow publishers to manage ministry stories and prayer updates.</li>
            <li>Page and content section tables are ready for publisher content management.</li>
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