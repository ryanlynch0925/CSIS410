<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Grace Bridge Missions";
$pageDescription = "Home page for Grace Bridge Missions, a fictional Christian mission organization.";
$pageKeywords = "Grace Bridge Missions, Christian missions, outreach, discipleship, Christian products";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Welcome to Grace Bridge Missions</h2>

    <p>
        Grace Bridge Missions is a fictional Christian mission organization created for this
        CMS sessions project. The purpose of the organization is to connect believers with
        opportunities to serve, support missionaries, pray for outreach work, and purchase
        Christian resources that encourage discipleship.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Our Mission:</strong>
            Grace Bridge Missions exists to share the love of Jesus Christ through service,
            discipleship, prayer, and practical support for mission-focused ministry.
        </p>
    </div>

    <h3>What We Do</h3>

    <p>
        The website includes ministry information, a Christian product store, a shopping cart,
        account access, publisher access, and administrator access. This version uses PHP sessions
        and arrays. In the final CMS project, the same structure can be expanded with a database.
    </p>

    <div class="dashboardBox">
        <h3>Ministry Focus Areas</h3>

        <table>
            <tr>
                <th>Ministry Area</th>
                <th>Description</th>
                <th>Scripture</th>
            </tr>

            <?php
            foreach ($ministries as $ministry) {
                echo "<tr>";
                echo "<td>" . cleanOutput($ministry["name"]) . "</td>";
                echo "<td>" . cleanOutput($ministry["description"]) . "</td>";
                echo "<td>" . cleanOutput($ministry["scripture"]) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>Shop Christian Resources</h3>

        <p>
            The Grace Bridge Missions store includes Christian products such as prayer journals,
            Scripture cards, devotion guides, discipleship books, and outreach resources.
        </p>

        <p>
            <a href="store.php">Visit the Store</a>
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Get Involved</h3>

        <p>
            Visitors can contact the organization, apply for mission opportunities, pray for
            ministry needs, and support outreach through product purchases.
        </p>

        <p>
            <a href="contact.php">Contact Us</a> |
            <a href="application.php">Mission Application</a> |
            <a href="prayer.php">Prayer Requests</a>
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Christian Worldview</h3>

        <p>
            This site is designed to reflect a Christian worldview by showing that technology,
            business, communication, and e-commerce can be used to serve others and point people
            toward Christ.
        </p>

        <p>
            <em>"Go therefore and make disciples of all nations..."</em>
            Matthew 28:19
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>