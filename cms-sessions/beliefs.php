<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Beliefs - Grace Bridge Missions";
$pageDescription = "Christian beliefs and worldview for Grace Bridge Missions.";
$pageKeywords = "beliefs, Christian worldview, Scripture, Grace Bridge Missions, faith";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Our Beliefs</h2>

    <p>
        Grace Bridge Missions is built around a Christian worldview. The organization believes
        that ministry, service, communication, and even e-commerce should be handled with honesty,
        compassion, and a desire to honor Jesus Christ.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Foundation:</strong>
            Grace Bridge Missions believes that Jesus Christ is the center of Christian service
            and that Scripture should guide how believers love God, serve others, and share the gospel.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Faith in Jesus Christ</h3>

        <p>
            The organization believes that true mission work begins with faith in Jesus Christ.
            Service is not only about meeting physical needs, but also about pointing people
            toward the hope found in the gospel.
        </p>

        <p>
            <em>"I am the way, and the truth, and the life. No one comes to the Father except through me."</em>
            John 14:6
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Love for Others</h3>

        <p>
            Grace Bridge Missions believes that Christian service should be marked by love.
            Outreach, giving, discipleship, and communication should reflect patience,
            kindness, humility, and care for people.
        </p>

        <p>
            <em>"By this all people will know that you are my disciples, if you have love for one another."</em>
            John 13:35
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Faithful Stewardship</h3>

        <p>
            The organization believes that resources should be managed wisely. Products,
            accounts, donations, and ministry information should be handled responsibly
            because stewardship is part of Christian character.
        </p>

        <p>
            <em>"Moreover, it is required of stewards that they be found faithful."</em>
            1 Corinthians 4:2
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Discipleship and Service</h3>

        <p>
            Grace Bridge Missions believes Christians are called to grow in faith and help others
            grow as well. Discipleship includes Bible study, prayer, encouragement, service,
            and a willingness to obey the Great Commission.
        </p>

        <p>
            <em>"Go therefore and make disciples of all nations..."</em>
            Matthew 28:19
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Technology Used for Good</h3>

        <p>
            This website demonstrates how technology can support Christian ministry. PHP sessions,
            forms, shopping cart features, and future CMS tools can help organize ministry work
            and make outreach easier to manage.
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>