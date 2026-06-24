<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "About Us - Grace Bridge Missions";
$pageDescription = "About Grace Bridge Missions and its Christian mission purpose.";
$pageKeywords = "about, Christian missions, Grace Bridge Missions, outreach, discipleship";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>About Grace Bridge Missions</h2>

    <p>
        Grace Bridge Missions is a fictional Christian mission organization created for this
        CMS sessions project. The organization exists to connect people, churches, and families
        with opportunities to serve others through prayer, outreach, discipleship, and practical
        Christian resources.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Purpose Statement:</strong>
            Grace Bridge Missions seeks to build a bridge between faith and action by helping
            believers serve others in the name of Jesus Christ.
        </p>
    </div>

    <h3>Who We Serve</h3>

    <p>
        The organization focuses on serving local communities, supporting missionaries,
        encouraging families, and providing resources that help people grow in biblical truth.
        Every ministry effort is designed to reflect compassion, honesty, service, and faithfulness.
    </p>

    <h3>Why the Website Exists</h3>

    <p>
        This website provides a framework for a future content management system. Visitors can
        learn about the mission organization, browse Christian products, use a shopping cart,
        complete forms, and log into different account areas based on session roles.
    </p>

    <div class="dashboardBox">
        <h3>Core Values</h3>

        <ul>
            <li>Faithfulness to Jesus Christ and Scripture.</li>
            <li>Service to others through love and humility.</li>
            <li>Honesty in communication, content, and e-commerce.</li>
            <li>Discipleship that helps believers grow in faith.</li>
            <li>Prayerful support for missionaries and communities.</li>
        </ul>
    </div>

    <div class="dashboardBox">
        <h3>Christian Worldview</h3>

        <p>
            Grace Bridge Missions believes that online tools can be used for more than business
            or information. A website can also encourage prayer, support missions, share biblical
            truth, and help people take practical steps of service.
        </p>

        <p>
            <em>"Let each of you look not only to his own interests, but also to the interests of others."</em>
            Philippians 2:4
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>