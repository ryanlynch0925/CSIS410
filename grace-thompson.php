<?php
include("session_check.php");
include("variables.php");

$pageTitle = "Grace Thompson Employee Profile";
$pageDescription = "Employee profile for Grace Thompson at Aunt Lissa's Grace Closet.";
$pageKeywords = "Grace Thompson, employee profile, Aunt Lissa's Grace Closet";
?>
<?php
include("header.php");
include("menu.php");
?>

    <div class="content">
        <?php
        displayEmployeeProfile($graceName, $graceTitle, $graceDepartment, $graceDegree, $graceFavoriteBook, $graceHobbies, $graceGoal, $gracePhoto)
        ?>

        <p><a href="orgchart.php">Return to Organizational Chart</a></p>

        <p class="aiNotice">These photos were generated with ChatGPT image generation.</p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>