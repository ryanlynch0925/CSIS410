<?php
include("session_check.php");
include("variables.php");

$pageTitle = "Daniel Brooks Employee Profile";
$pageDescription = "Employee profile for Daniel Brooks at Aunt Lissa's Grace Closet.";
$pageKeywords = "Daniel Brooks, employee profile, Aunt Lissa's Grace Closet";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo $pageTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="<?php echo $pageDescription; ?>" />
    <meta name="keywords" content="<?php echo $pageKeywords; ?>" />
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo filemtime('styles.css'); ?>" />
</head>

<body>
    <div id="container">
        <div class="header">
            <h1>Aunt Lissa's Grace Closet</h1>
            <p class="tagline">Employee Profile</p>
        </div>
    </div>

    <div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="foundations.php">Module 1 Foundations</a></li>
            <li><a href="orgchart.php">Module 1 Variables</a></li>
            <li><a href="forms.php">Module 2 Forms</a></li>
            <li><a href="arrays.php">Module 3 Arrays</a></li>
            <li><a href="login.php">Module 4 Sessions</a></li>
            <li><a href="#">Module 5 CMS Sessions</a></li>
            <li><a href="#">Module 6 Database</a></li>
            <li><a href="#">Module 8 CMS Database</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="phpinfo.php">PHP Info</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>

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