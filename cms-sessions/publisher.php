<?php
$allowedRoles = array("publisher", "administrator");

include("session_check.php");
include("functions.php");
include("data.php");

$pageTitle = "Publisher Dashboard - Grace Bridge Missions";
$pageDescription = "Pulisher dashboard for Grace Bridge Missions ministry content.";
$pageKeywords = "publisher, content, ministry, sessions, Grace Bridge Missions";

$displayName = "Content Publisher";

if (isset($_SESSION["displayName"])) {
    $displayName = $_SESSION["displayName"];
}

$ministries = array();
$contentSections = array();

$ministryStatement = $pdo->query("
    SELECT
        id,
        ministry_name,
        ministry_description,
        scripture,
        is_active
    FROM ministries
    ORDER BY ministry_name
");
$ministries = $ministryStatement->fetchAll();

$contentStatement = $pdo->query("
    SELECT
        content_sections.id,
        pages.page_title,
        content_sections.section_title,
        content_sections.section_body,
        content_sections.section_type,
        content_sections.is_active
    FROM content_sections
    INNER JOIN pages ON content_sections.page_id = pages.id
    ORDER BY pages.page_title, content_sections.display_order
");

$contentSections = $contentStatement->fetchAll();

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Publisher Dashboard</h2>

    <div class="noticeBox">
        <p>
            Welcome, <strong><?php echo cleanOutput($displayName); ?></strong>
        </p>

        <p>
            <a href="publisher_content.php">Manage Website Content</a>
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
            if (count($ministries) > 0) {
                foreach ($ministries as $ministry) {
                    echo "<tr>";
                    echo "<td>" . cleanOutput($ministry["ministry_name"]) ."</td>";
                    echo "<td>" . cleanOutput($ministry["ministry_description"]) ."</td>";
                    echo "<td>" . cleanOutput($ministry["scripture"]) ."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan='3'>No ministries found.</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="dashboardBox">
        <h3>Editable Website Content Sections</h3>

        <table>
            <tr>
                <th>Page</th>
                <th>Section</th>
                <th>Type</th>
                <th>Status</th>
            </tr>

            <?php
            if (count($contentSections) > 0) {
                foreach ($contentSections as $section) {
                    echo "<tr>";
                    echo "<td>" . cleanOutput($section["page_title"]) . "</td>";
                    echo "<td>" . cleanOutput($section["section_title"]) . "</td>";
                    echo "<td>" . cleanOutput($section["section_type"]) . "</td>";

                    if ($section["is_active"] == 1) {
                        echo "<td>Active</td>";
                    } else {
                        echo "<td>Inactive</td>";
                    }

                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan=\"4\">No editable content sections found.</td>";
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