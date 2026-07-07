<?php
include("session_check.php");
include("db_connect.php");

$pageTitle = "Delete Comment";
$pageDescription = "Delete a database comment from the organizational chart.";
$pageKeywords = "PHP, MySQL, delete comment, database";

$id = 0;
$name = "";
$title = "";
$comments = "";
$errorMessage = "";

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
}

if ($id <= 0) {
    $errorMessage = "Invalid comment selected.";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "DELETE FROM comments WHERE ID = $id";

    $result = mysqli_query($dbc, $query);

    if ($result) {
        header("Location: orgchart.php");
        exit();
    } else {
        $errorMessage = "The comment could not be deleted: " . mysqli_error($dbc);
    }
} else {
    $query = "SELECT ID, name, title, comments FROM comments WHERE ID = $id";
    $result = mysqli_query($dbc, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row["name"];
        $title = $row["title"];
        $comments = $row["comments"];
    } else {
        $errorMessage = "Comment not found.";
    }
}

include("header.php");
include("menu.php");
?>

<div class="content formBox">
    <h2>Delete Comment</h2>

    <?php
    if ($errorMessage != "") {
        echo "<p class=\"error\">" . htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') . "</p>";
    }
    ?>

    <?php
    if ($errorMessage == "") {
    ?>
        <p>
            Are you sure you want to delete the following comment?
        </p>

        <div class="commentBox">
            <h3><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h3>
            
            <p>
                <strong>Name:</strong> <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
            </p>
            <p>
                <strong>Comments:</strong><br />
                <?php echo nl2br(htmlspecialchars($comments, ENT_QUOTES, 'UTF-8')); ?>
            </p>
        </div>

        <form action="comment_delete.php" method="post">
            <p>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <input type="submit" value="Delete Comment" />
            </p>
        </form>
    <?php   
    }
    ?>

    <p>
        <a href="orgchart.php">Cancel and Return to Organizational Chart</a>
    </p>
</div>

<?php
include("footer.php");
?>

    </div>
</body>
</html>