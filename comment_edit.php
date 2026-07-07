<?php
include("session_check.php");
include("db_connect.php");

$pageTitle = "Edit Comment";
$pageDescription = "Edit a database comment for the organizational chart.";
$pageKeywords = "PHP, MySQL, edit comment, database";

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
    if (isset($_POST["name"])) {
        $name = trim($_POST["name"]);
    }

    if (isset($_POST["title"])) {
        $title = trim($_POST["title"]);
    }

    if (isset($_POST["comments"])) {
        $comments = trim($_POST["comments"]);
    }

    if ($name == "") {
        $errorMessage = "Please enter your name.";
    } elseif ($title == "") {
        $errorMessage = "Please enter a title for your comment.";
    } elseif ($comments == "") {
        $errorMessage = "Please enter your comment.";
    } else {
        $safeName = mysqli_real_escape_string($dbc, $name);
        $safeTitle = mysqli_real_escape_string($dbc, $title);
        $safeComments = mysqli_real_escape_string($dbc, $comments);

        $query = "UPDATE comments SET name='$safeName', title='$safeTitle', comments='$safeComments' WHERE ID = $id";

        $result = mysqli_query($dbc, $query);

        if ($result) {
            header("Location: orgchart.php");
            exit();
        } else {
            $errorMessage = "The comment could not be updated: " . mysqli_error($dbc);
        }
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
    <h2>Edit Comment</h2>

    <?php
    if ($errorMessage != "") {
        echo "<p class=\"error\">" . htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8') . "</p>";
    }
    ?>

    <?php
    if ($errorMessage == "" || $id > 0) {
    ?>
        <form action="comment_edit.php" method="post">
            <p>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
            </p>

            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>" />
            </p>

            <p>
                <label for="title">Comment Title:</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" />
            </p>

            <p>
                <label for="comments">Comment:</label>
                <textarea name="comments" id="comments" rows="6" cols="40"><?php echo htmlspecialchars($comments, ENT_QUOTES, 'UTF-8'); ?></textarea>
            </p>

            <p>
                <input type="submit" value="Update Comment" />
            </p>
        </form>
    <?php
    }
    ?>

    <p>
        <a href="orgchart.php">Return to Organizational Chart</a>
    </p>
</div>

<?php
include("footer.php");
?>

    </div>
</body>
</html>