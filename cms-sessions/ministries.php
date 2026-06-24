<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Ministries - Grace Bridge Missions";
$pageDescription = "Ministry areas served by Grace Bridge Missions.";
$pageKeywords = "ministries, outreach, discipleship, missionaries, Christian service, Grace Bridge Missions";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Our Ministries</h2>

    <p>
        Grace Bridge Missions serves through several ministry areas that support Christian
        outreach, discipleship, missionary care, and family encouragement. Each ministry area
        is designed to help people serve others while pointing them toward Jesus Christ.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Ministry Purpose:</strong>
            Every ministry of Grace Bridge Missions exists to connect faith with action through
            prayer, service, discipleship, and biblical encouragement.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Ministry Areas</h3>

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
        <h3>Local Outreach</h3>

        <p>
            Local outreach focuses on serving nearby families and communities through prayer,
            encouragement, food support, and practical ministry partnerships. Grace Bridge Missions
            believes local service is one way believers can show the love of Christ in everyday life.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Missionary Support</h3>

        <p>
            Missionary support includes prayer, encouragement, financial assistance, and practical
            resources for people serving in mission fields. The goal is to help missionaries remain
            encouraged and equipped for gospel-centered work.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Discipleship Resources</h3>

        <p>
            Discipleship resources help individuals, families, and churches grow in biblical truth.
            These resources may include devotion guides, prayer journals, Scripture cards, and
            study materials from the Grace Bridge Missions store.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Children's Ministry</h3>

        <p>
            Children's ministry focuses on helping younger learners understand Scripture, prayer,
            service, and the love of Jesus through age-appropriate resources and activities.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Get Involved</h3>

        <p>
            Visitors who want to serve can complete the mission application form or contact
            Grace Bridge Missions for more information about ministry opportunities.
        </p>

        <p>
            <a href="application.php">Mission Application</a> |
            <a href="contact.php">Contact Us</a>
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>