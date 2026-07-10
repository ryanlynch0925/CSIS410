<?php
$allowedRoles = array("publisher", "administrator");

include("session_check.php");
include("functions.php");
include("data.php");

$pageTitle = "Publisher Content Management - Grace Bridge Missions";
$pageDescription = "Publisher content management page for Grace Bridge Missions CMS.";
$pageKeywords = "publisher, content, CMS, database, Grace Bridge Missions";

$message = "";
$errorMessage = "";

$currentUserId = null;

if (isset($_SESSION["user_id"])) {
    $currentUserId = (int)$_SESSION["user_id"];
}

/*
    Add new content section.
*/
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addSection"])) {
    $pageId = trim($_POST["pageId"] ?? "");
    $sectionKey = trim($_POST["sectionKey"] ?? "");
    $sectionTitle = trim($_POST["sectionTitle"] ?? "");
    $sectionBody = trim($_POST["sectionBody"] ?? "");
    $sectionType = trim($_POST["sectionType"] ?? "text");

    if (!numbersOnly($pageId)) {
        $errorMessage = "Please choose a valid page.";
    } elseif ($sectionKey == "" || $sectionTitle == "" || $sectionBody == "") {
        $errorMessage = "Please complete all required content fields.";
    } else {
        $insertStatement = $pdo->prepare("
            INSERT INTO content_sections (
                page_id,
                section_key,
                section_title,
                section_body,
                section_type,
                display_order,
                is_active,
                created_by,
                updated_by
            )
            VALUES (
                :page_id,
                :section_key,
                :section_title,
                :section_body,
                :section_type,
                0,
                1,
                :created_by,
                :updated_by
            )
        ");

        try {
            $insertStatement->execute([
                ":page_id" => (int)$pageId,
                ":section_key" => $sectionKey,
                ":section_title" => $sectionTitle,
                ":section_body" => $sectionBody,
                ":section_type" => $sectionType,
                ":created_by" => $currentUserId,
                ":updated_by" => $currentUserId
            ]);

            $message = "The content section was added successfully.";
        } catch (PDOException $e) {
            $errorMessage = "The content section could not be added. Make sure the section key is unique for that page.";
        }
    }
}

/*
    Update existing content section.
*/
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateSection"])) {
    $sectionId = trim($_POST["sectionId"] ?? "");
    $sectionTitle = trim($_POST["sectionTitle"] ?? "");
    $sectionBody = trim($_POST["sectionBody"] ?? "");
    $sectionType = trim($_POST["sectionType"] ?? "text");
    $isActive = 0;

    if (isset($_POST["isActive"])) {
        $isActive = 1;
    }

    if (!numbersOnly($sectionId)) {
        $errorMessage = "The selected content section could not be found.";
    } elseif ($sectionTitle == "" || $sectionBody == "") {
        $errorMessage = "Please complete the section title and body.";
    } else {
        $updateStatement = $pdo->prepare("
            UPDATE content_sections
            SET
                section_title = :section_title,
                section_body = :section_body,
                section_type = :section_type,
                is_active = :is_active,
                updated_by = :updated_by
            WHERE id = :id
        ");

        $updateStatement->execute([
            ":section_title" => $sectionTitle,
            ":section_body" => $sectionBody,
            ":section_type" => $sectionType,
            ":is_active" => $isActive,
            ":updated_by" => $currentUserId,
            ":id" => (int)$sectionId
        ]);

        $message = "The content section was updated successfully.";
    }
}

/*
    Pull pages for the add form.
*/
$pageStatement = $pdo->query("
    SELECT
        id,
        page_title,
        page_slug
    FROM pages
    WHERE status = 'published'
    ORDER BY page_title
");

$pages = $pageStatement->fetchAll();

/*
    Pull content sections for editing.
*/
$contentStatement = $pdo->query("
    SELECT
        content_sections.id,
        content_sections.page_id,
        content_sections.section_key,
        content_sections.section_title,
        content_sections.section_body,
        content_sections.section_type,
        content_sections.is_active,
        pages.page_title
    FROM content_sections
    INNER JOIN pages ON content_sections.page_id = pages.id
    ORDER BY pages.page_title, content_sections.display_order, content_sections.id
");

$contentSections = $contentStatement->fetchAll();

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Publisher Content Management</h2>

    <p>
        Publishers can add and modify website text stored in the database. This helps make
        the Grace Bridge Missions CMS database-driven instead of hardcoded.
    </p>

    <?php
    if ($message != "") {
        echo "<div class=\"success\"><p>" . cleanOutput($message) . "</p></div>";
    }

    if ($errorMessage != "") {
        echo "<div class=\"error\"><p>" . cleanOutput($errorMessage) . "</p></div>";
    }
    ?>

    <div class="dashboardBox">
        <h3>Add New Content Section</h3>

        <form action="publisher_content.php" method="post">
            <p>
                <label for="pageId">Page:</label>
                <select name="pageId" id="pageId" required>
                    <option value="">Choose a page</option>
                    <?php
                    foreach ($pages as $page) {
                        echo "<option value=\"" . cleanOutput($page["id"]) . "\">";
                        echo cleanOutput($page["page_title"]);
                        echo "</option>";
                    }
                    ?>
                </select>
            </p>

            <p>
                <label for="sectionKey">Section Key:</label>
                <input type="text" name="sectionKey" id="sectionKey" required />
            </p>

            <p>
                <label for="sectionTitle">Section Title:</label>
                <input type="text" name="sectionTitle" id="sectionTitle" required />
            </p>

            <p>
                <label for="sectionType">Section Type:</label>
                <select name="sectionType" id="sectionType">
                    <option value="text">Text</option>
                    <option value="verse">Verse</option>
                    <option value="callout">Callout</option>
                    <option value="button">Button</option>
                </select>
            </p>

            <p>
                <label for="sectionBody">Section Body:</label>
                <textarea name="sectionBody" id="sectionBody" rows="6" required></textarea>
            </p>

            <p>
                <input type="submit" name="addSection" value="Add Content Section" />
            </p>
        </form>
    </div>

    <div class="dashboardBox">
        <h3>Edit Existing Content Sections</h3>

        <?php
        if (count($contentSections) == 0) {
            echo "<p>No content sections found.</p>";
        } else {
            foreach ($contentSections as $section) {
        ?>

            <form action="publisher_content.php" method="post" class="editForm">
                <input type="hidden" name="sectionId" value="<?php echo cleanOutput($section["id"]); ?>" />

                <h4>
                    <?php echo cleanOutput($section["page_title"]); ?>:
                    <?php echo cleanOutput($section["section_key"]); ?>
                </h4>

                <p>
                    <label>Section Title:</label>
                    <input type="text" name="sectionTitle"
                        value="<?php echo cleanOutput($section["section_title"]); ?>" required />
                </p>

                <p>
                    <label>Section Type:</label>
                    <select name="sectionType">
                        <option value="text" <?php if ($section["section_type"] == "text") echo "selected"; ?>>Text</option>
                        <option value="verse" <?php if ($section["section_type"] == "verse") echo "selected"; ?>>Verse</option>
                        <option value="callout" <?php if ($section["section_type"] == "callout") echo "selected"; ?>>Callout</option>
                        <option value="button" <?php if ($section["section_type"] == "button") echo "selected"; ?>>Button</option>
                    </select>
                </p>

                <p>
                    <label>Section Body:</label>
                    <textarea name="sectionBody" rows="5" required><?php echo cleanOutput($section["section_body"]); ?></textarea>
                </p>

                <p>
                    <label>
                        <input type="checkbox" name="isActive" value="1"
                            <?php if ($section["is_active"] == 1) echo "checked"; ?> />
                        Active
                    </label>
                </p>

                <p>
                    <input type="submit" name="updateSection" value="Update Section" />
                </p>
            </form>

            <hr />

        <?php
            }
        }
        ?>
    </div>

    <p>
        <a href="publisher.php">Return to Publisher Dashboard</a>
    </p>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>