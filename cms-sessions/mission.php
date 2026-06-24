<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Mission - Grace Bridge Missions";
$pageDescription = "Mission statement and goals for Grace Bridge Missions.";
$pageKeywords = "mission, Christian outreach, Grace Bridge Missions, discipleship, service";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Our Mission</h2>

    <p>
        The mission of Grace Bridge Missions is to share the love of Jesus Christ through
        faithful service, discipleship, prayer, and practical outreach. The organization seeks
        to connect believers with opportunities to serve others while supporting missionary work
        and Christian resource development.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Mission Statement:</strong>
            Grace Bridge Missions exists to build bridges of grace by serving communities,
            supporting missionaries, and helping people grow as disciples of Jesus Christ.
        </p>
    </div>

    <h3>Mission Goals</h3>

    <ul>
        <li>Support missionaries through prayer, encouragement, and practical resources.</li>
        <li>Provide Christian products that encourage Bible study, prayer, and discipleship.</li>
        <li>Help families and churches find simple ways to serve their communities.</li>
        <li>Use online tools to organize ministry content, products, accounts, and outreach forms.</li>
        <li>Reflect a Christian worldview in both public content and account-based CMS areas.</li>
    </ul>

    <div class="dashboardBox">
        <h3>Faith in Action</h3>

        <p>
            Grace Bridge Missions believes that faith should lead to action. A mission organization
            should not only communicate good ideas, but also help people take practical steps of
            obedience, compassion, and service.
        </p>

        <p>
            <em>"Even so faith, if it hath not works, is dead, being alone."</em>
            James 2:17
        </p>
    </div>

    <div class="dashboardBox">
        <h3>How the Website Supports the Mission</h3>

        <p>
            This website supports the mission by providing information pages, Christian products,
            a shopping cart, checkout totals, contact forms, mission application forms, and
            account areas for customers, publishers, and administrators.
        </p>

        <p>
            In this sessions assignment, PHP sessions help manage cart data and user access.
            In the future database assignment, the same mission framework can be expanded into
            a full CMS that stores content, products, users, and orders in database tables.
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>