<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Vision - Grace Bridge Missions";
$pageDescription = "Vision and future goals for Grace Bridge Missions.";
$pageKeywords = "vision, Christian missions, outreach, discipleship, Grace Bridge Missions";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Our Vision</h2>

    <p>
        The vision of Grace Bridge Missions is to see believers equipped to serve faithfully,
        families strengthened through biblical discipleship, and communities encouraged through
        Christ-centered outreach.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Vision Statement:</strong>
            Grace Bridge Missions desires to become a trusted Christian mission organization
            that uses ministry, technology, and e-commerce to support outreach and discipleship.
        </p>
    </div>

    <h3>Future Goals</h3>

    <ul>
        <li>Provide clear ministry information for visitors and supporters.</li>
        <li>Offer Christian products that encourage prayer, Scripture memory, and discipleship.</li>
        <li>Use customer accounts to support shopping cart and checkout features.</li>
        <li>Allow publishers to prepare ministry updates and prayer content.</li>
        <li>Allow administrators to manage users, products, and future CMS content.</li>
    </ul>

    <div class="dashboardBox">
        <h3>Long-Term CMS Vision</h3>

        <p>
            This sessions project creates the structure for a larger content management system.
            The current version uses PHP sessions and arrays. In the future database project,
            the website can be expanded so products, users, content pages, and orders are managed
            through database tables.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Technology with Purpose</h3>

        <p>
            Grace Bridge Missions views technology as a tool for service. A website should not
            only display information, but also help people take meaningful steps toward prayer,
            generosity, discipleship, and mission involvement.
        </p>

        <p>
            <em>"Where there is no vision, the people perish..."</em>
            Proverbs 29:18
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Objectives for This Website</h3>

        <p>
            This website is designed to demonstrate public ministry pages, session-based account
            access, a Christian product store, a shopping cart, checkout totals, form validation,
            and preparation for a future database-driven CMS.
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>