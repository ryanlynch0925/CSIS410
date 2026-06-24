<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");

$pageTitle = "Missionaries - Grace Bridge Missions";
$pageDescription = "Missionary support page for Grace Bridge Missions.";
$pageKeywords = "missionaries, missionary support, prayer, Christian missions, Grace Bridge Missions";

$missionaries = array(
    array(
        "name" => "The Carter Family",
        "location" => "Central America",
        "focus" => "Church planting and family discipleship",
        "prayerNeed" => "Pray for wisdom, language growth, and open doors for gospel conversations."
    ),
    array(
        "name" => "Grace Thompson",
        "location" => "East Africa",
        "focus" => "Children's ministry and education support",
        "prayerNeed" => "Pray for safety, strong local partnerships, and children to understand the love of Christ."
    ),
    array(
        "name" => "Daniel Brooks",
        "location" => "Southeast Asia",
        "focus" => "Bible teaching and leadership training",
        "prayerNeed" => "Pray for faithful teaching, healthy churches, and encouragement for local leaders."
    )
);

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Missionary Support</h2>

    <p>
        Grace Bridge Missions supports missionaries through prayer, encouragement,
        financial gifts, and Christian resources. Missionary care is an important part
        of serving the global church and helping the gospel reach more communities.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Missionary Care Goal:</strong>
            Grace Bridge Missions wants every missionary partner to feel prayed for,
            encouraged, and supported as they serve Christ.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Missionary Partners</h3>

        <table>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Ministry Focus</th>
                <th>Prayer Need</th>
            </tr>

            <?php
            foreach ($missionaries as $missionary) {
                echo "<tr>";
                echo "<td>" . cleanOutput($missionary["name"]) . "</td>";
                echo "<td>" . cleanOutput($missionary["location"]) . "</td>";
                echo "<td>" . cleanOutput($missionary["focus"]) . "</td>";
                echo "<td>" . cleanOutput($missionary["prayerNeed"]) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>How We Support Missionaries</h3>

        <ul>
            <li>Praying regularly for missionaries and their families.</li>
            <li>Sharing missionary updates with supporters.</li>
            <li>Providing Christian resources for discipleship and outreach.</li>
            <li>Encouraging churches and families to participate in mission support.</li>
        </ul>
    </div>

    <div class="dashboardBox">
        <h3>Prayer and Partnership</h3>

        <p>
            Missionary work should not be disconnected from the local church or Christian families.
            Grace Bridge Missions encourages supporters to pray faithfully, give wisely, and stay
            informed about the needs of those serving in ministry.
        </p>

        <p>
            <em>"Declare his glory among the nations, his marvelous works among all the peoples!"</em>
            Psalm 96:3
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Get Involved</h3>

        <p>
            Visitors who want to support missionary work can pray, contact Grace Bridge Missions,
            shop Christian resources, or complete the mission application form.
        </p>

        <p>
            <a href="prayer.php">Prayer Requests</a> |
            <a href="store.php">Visit Store</a> |
            <a href="application.php">Mission Application</a>
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>