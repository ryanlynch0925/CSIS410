<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");

$pageTitle = "Prayer Requests - Grace Bridge Missions";
$pageDescription = "Prayer request page for Grace Bridge Missions.";
$pageKeywords = "prayer, requests, missions, Christian support, Grace Bridge Missions";

$prayerRequests = array(
    array(
        "area" => "Missionary Families",
        "request" => "Pray for strength, encouragement, safety, and spiritual growth for missionary families serving away from home.",
        "scripture" => "Philippians 4:6"
    ),
    array(
        "area" => "Local Outreach",
        "request" => "Pray for open doors to serve families in local communities with compassion and truth.",
        "scripture" => "Galatians 6:10"
    ),
    array(
        "area" => "Children's Ministry",
        "request" => "Pray that children would understand the love of Jesus and grow in faith through Bible-centered resources.",
        "scripture" => "Mark 10:14"
    ),
    array(
        "area" => "Discipleship Resources",
        "request" => "Pray that devotion guides, Scripture cards, and study resources would help families grow closer to Christ.",
        "scripture" => "2 Timothy 2:2"
    )
);

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Prayer Requests</h2>

    <p>
        Prayer is central to the mission of Grace Bridge Missions. Before ministry work,
        product sales, outreach events, or future CMS planning, the organization desires
        to seek the Lord and depend on Him.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Prayer Focus:</strong>
            Grace Bridge Missions encourages supporters to pray for missionaries, local outreach,
            children, families, churches, and discipleship efforts.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Current Prayer Needs</h3>

        <table>
            <tr>
                <th>Prayer Area</th>
                <th>Request</th>
                <th>Scripture</th>
            </tr>

            <?php
            foreach ($prayerRequests as $request) {
                echo "<tr>";
                echo "<td>" . cleanOutput($request["area"]) . "</td>";
                echo "<td>" . cleanOutput($request["request"]) . "</td>";
                echo "<td>" . cleanOutput($request["scripture"]) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>How to Pray</h3>

        <ul>
            <li>Pray for missionaries to remain faithful and encouraged.</li>
            <li>Pray for families to grow in Scripture and discipleship.</li>
            <li>Pray for local outreach to meet real needs with Christian love.</li>
            <li>Pray for the website to be used with honesty, clarity, and purpose.</li>
        </ul>
    </div>

    <div class="dashboardBox">
        <h3>Submit a Prayer Need</h3>

        <p>
            Visitors who want to share a prayer need can use the contact form.
            In the future database CMS project, prayer requests could be stored and managed
            through the administrator or publisher dashboard.
        </p>

        <p>
            <a href="contact.php">Contact Grace Bridge Missions</a>
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Scripture Encouragement</h3>

        <p>
            <em>"Do not be anxious about anything, but in everything by prayer and supplication with thanksgiving let your requests be made known to God."</em>
            Philippians 4:6
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>