?<?php
$allowedRoles = array("publisher", "admin");

include("session_check.php");
include("functions.php");
include("data.php");

$pageTitle = "Publisher Dashboard - Grace Bridge Missions";
$pageDescription = "Pulisher dashboard for Grace Bridge Missions ministry content.";
$pageKeywords = "publisher, content, ministry, sessions, Grace Bridge Missions";

include("header.php");
include("menu.php");

$displayName = "Content Publisher";

if (isset($_SESSION["displayName"])) {
    $displayName = $_SESSION["displayName"];
}
?>

<div class="content">
    <h2>Publisher Dashboard</h2>

    <div class="noticeBox">
        <p>
            Welcome, <strong><?php echo cleanOutput($displayName); ?></strong>
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Content Mangement Purpose</h3>

        <p>
            The publisher area is designed for preparing ministry updates, missionary stories,
            prayer requests, and Christian resource content. In this sessions version of the CMS,
            content is displayed from PHP arrays. In the final database project, this area can be
            expanded to manage content stored in database tables.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Ministry Content Review</h3>

        <table>
            <tr>
                <th>Ministry Area</th>
                <th>Description</th>
                <th>Scripture</th>
            </tr>

            <?php
            foreach ($ministries as $ministry) {
                echo "<tr>";
                echo "<td>" . cleanOutput($ministry["name"]) ."</td>";
                echo "<td>" . cleanOutput($ministry["description"]) ."</td>";
                echo "<td>" . cleanOutput($ministry["scripture"]) ."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>Suggested Publisher Tasks</h3>

        <ul>
            <li>Review ministry descriptions for biblical clarity.</li>
            <li>Prepare new missionary updates for the public website.</li>
            <li>Check product descriptions for a clear Christian worldview.</li>
            <li>Prepare prayer request content for the prayer page.</li>
        </ul>
    </div>

    <div class="dashboardBox">
        <h3>Christian Worldview Reminder</h3>

        <p>
            Published content should point visitors toward Christ, encourage service, and support the mission of making disciples.
        </p>

        <p>
            <em>"Declare his glory among the nations, his marvelous works among all the peoples!"</em>
            Psalm 96:3
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