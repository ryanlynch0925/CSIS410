<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Donate - Grace Bridge Missions";
$pageDescription = "Donation information page for Grace Bridge Missions.";
$pageKeywords = "donate, missions, giving, Christian outreach, Grace Bridge Missions";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Support the Mission</h2>

    <p>
        Grace Bridge Missions depends on prayer, generosity, and faithful service.
        Donations help support missionary care, local outreach, discipleship resources,
        children's ministry, and Christian product development.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Giving Purpose:</strong>
            Every gift should be handled with honesty, stewardship, and a desire to honor Christ.
            This practice page explains donation goals, but it does not process real donations.
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Ways Donations Could Help</h3>

        <ul>
            <li>Provide practical support for missionary families.</li>
            <li>Purchase supplies for local outreach events.</li>
            <li>Create discipleship resources for families and churches.</li>
            <li>Support children's ministry materials and activities.</li>
            <li>Help maintain future CMS tools for ministry communication.</li>
        </ul>
    </div>

    <div class="dashboardBox">
        <h3>Donation Categories</h3>

        <table>
            <tr>
                <th>Category</th>
                <th>Purpose</th>
            </tr>

            <tr>
                <td>Missionary Support</td>
                <td>Helps provide encouragement, resources, and practical care for missionaries.</td>
            </tr>

            <tr>
                <td>Local Outreach</td>
                <td>Supports community service, food support, and local ministry partnerships.</td>
            </tr>

            <tr>
                <td>Discipleship Resources</td>
                <td>Helps create devotion guides, Bible study tools, and family ministry materials.</td>
            </tr>

            <tr>
                <td>Children's Ministry</td>
                <td>Supports Bible-centered activities and outreach resources for children.</td>
            </tr>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>Practice Donation Notice</h3>

        <p>
            This page does not collect payment information. For this sessions project,
            the e-commerce checkout process stops after the cart total and estimated taxes
            are calculated.
        </p>

        <p>
            Visitors who want to support the fictional mission can browse the store or contact
            Grace Bridge Missions for more information.
        </p>

        <p>
            <a href="store.php">Visit Store</a> |
            <a href="contact.php">Contact Us</a>
        </p>
    </div>

    <div class="dashboardBox">
        <h3>Christian Stewardship Reminder</h3>

        <p>
            Grace Bridge Missions believes giving should be done with a willing heart,
            clear purpose, and faithful stewardship.
        </p>

        <p>
            <em>"Each one must give as he has decided in his heart, not reluctantly or under compulsion, for God loves a cheerful giver."</em>
            2 Corinthians 9:7
        </p>
    </div>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>