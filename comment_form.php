<?php
include("session_check.php");
include("db_connect.php");

$pageTitle = "Add Comment";
$pageDescription = "Add a database comment for the organizational chart.";
$pageKeywords = "PHP, MySQL, comments, database";

$name = "";
$title = "";
$comments = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $query = "INSERT INTO comments (name, title, comments) VALUES ('$safeName', '$safeTitle', '$safeComments')";

        $result = mysqli_query($dbc, $query);

        if ($result) {
            $successMessage = "Your comment has been added successfully.";
            $name = "";
            $title = "";
            $comments = "";
        } else {
            $errorMessage = "The comment could not be saved: " . mysqli_error($dbc);
        }
    }
}

include("header.php");
include("menu.php");
?>

<div class=" formBox">
    <h2>Add a Comment</h2>

    <p>
        Use this form to add a comment about the organizational chart.
        Your Comment will be saved in the database and displayed on the chart page.
    </p>

    <?php
    if ($successMessage != "") {
        echo "<p class=\"success\">" . htmlspecialchars($successMessage) . "</p>";
    }

    if ($errorMessage != "") {
        echo "<p class=\"error\">" . htmlspecialchars($errorMessage) . "</p>";
    }
    ?>

    <form action="comment_form.php" method="post">
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" />
        </p>

        <p>
            <label for="title">Comment Title:</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" />
        </p>

        <p>
            <label for="comments">Comment:</label>
            <textarea name="comments" id="comments" rows="6" cols="40"><?php echo htmlspecialchars($comments); ?></textarea>
        </p>

        <p>
            <input type="submit" value="Submit Comment" />
        </p>
    </form>

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