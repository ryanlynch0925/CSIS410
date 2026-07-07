<?php
include("session_check.php");
include("variables.php");

$pageTitle = "Daniel Brooks Employee Profile";
$pageDescription = "Employee profile for Daniel Brooks at Aunt Lissa's Grace Closet.";
$pageKeywords = "Daniel Brooks, employee profile, Aunt Lissa's Grace Closet";
?>
<?php
include("header.php");
include("menu.php");
?>

    <div class="content">
        <?php
        displayEmployeeProfile($danielName, $danielTitle, $danielDepartment, $danielDegree, $danielFavoriteBook, $danielHobbies, $danielGoal, $danielPhoto)
        ?>

        <p><a href="orgchart.php">Return to Organizational Chart</a></p>

        <p class="aiNotice">These photos were generated with ChatGPT image generation.</p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>