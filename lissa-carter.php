<?php
include("session_check.php");
include("variables.php");

$pageTitle = "Melissa Carter Employee Profile";
$pageDescription = "Employee profile for Melissa Carter at Aunt Lissa's Grace Closet.";
$pageKeywords = "Melissa Carter, employee profile, Aunt Lissa's Grace Closet";
?>
<?php
include("header.php");
include("menu.php");
?>

    <div class="content">
        <?php
        displayEmployeeProfile($lissaName, $lissaTitle, $lissaDepartment, $lissaDegree, $lissaFavoriteBook, $lissaHobbies, $lissaGoal, $lissaPhoto)
        ?>

        <p><a href="orgchart.php">Return to Organizational Chart</a></p>

        <p class="aiNotice">These photos were generated with ChatGPT image generation.</p>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>