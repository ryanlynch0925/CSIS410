<?php
include("session_check.php");
include("variables.php");
include("db_connect.php");

$pageTitle = "Module 1 Variables Assignment";
$pageDescription = "Organizational chart for Aunt Lissa's Grace Closet using PHP variables and functions";
$pageKeywords = "PHP variables, PHP functions, organizational chart, employees";
?>

<?php
include("header.php");
include("menu.php");
?>

        <div class="content">
            <h2> Organizational Chart</h2>

            <p>
                Meet the Employees!
            </p>

            <div class="orgChart">
                <?php
                displayEmployeeCard($lissaName, $lissaTitle, $lissaDepartment, $lissaLink);
                displayEmployeeCard($graceName, $graceTitle, $graceDepartment, $graceLink);
                displayEmployeeCard($danielName, $danielTitle, $danielDepartment, $danielLink);
                ?>
            </div>

            <p class="aiNotice">
                These photos were generated with ChatGPT image generation.
            </p>

            <h2>Comments</h2>

            <p>
                <a href="comment_form.php">Add a New Comment</a>
            </p>

            <?php
            $query = "SELECT ID, name, title, comments, commentdate FROM comments ORDER BY commentdate DESC";

            $result = mysqli_query($dbc, $query);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class=\"commentBox\">";
                        echo "<h3>" . htmlspecialchars($row["title"], ENT_QUOTES, "UTF-8") . "</h3>";
                        echo "<p><strong>Name:</strong> " . htmlspecialchars($row["name"], ENT_QUOTES, "UTF-8") . "</p>";
                        echo "<p><strong>Title:</strong> " . htmlspecialchars($row["title"], ENT_QUOTES, "UTF-8") . "</p>";
                        echo "<p><strong>Date:</strong> " . htmlspecialchars($row["commentdate"], ENT_QUOTES, "UTF-8") . "</p>";
                        echo "<p><strong>Comments:</strong><br />" . nl2br(htmlspecialchars($row["comments"], ENT_QUOTES, "UTF-8")) . "</p>";
                        echo "<p>";
                        echo "<a href=\"comment_edit.php?id=" . $row["ID"] . "\">Edit</a> | ";
                        echo "<a href=\"comment_delete.php?id=" . $row["ID"] . "\">Delete</a>";
                        echo "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No comments have been submitted yet. Be the first to add a comment!</p>";
                }
            } else {
                echo "<p class=\"error\">Comments could not be loaded: " . mysqli_error($dbc) . "</p>";
            }
            ?>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
                