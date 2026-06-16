<?php
include("session_check.php");
include("variables.php");

$pageTitle = "Module 1 Variables Assignment";
$pageDescription = "Organizational chart for Aunt Lissa's Grace Closet using PHP variables and functions";
$pageKeywords = "PHP variables, PHP functions, organizational chart, employees";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo $pageTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="<?php echo $pageDescription; ?>" />
    <meta name="keywords" content="<?php echo $pageKeywords; ?>" />
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo filemtime('styles.css'); ?>" />
</head>

<body>
    <div id="container">
        <div class="header">
            <h1>Aunt Lissa's Grace Closet</h1>
            <p class="tagline">Module 1 Variables Assignment</p>
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
        </div>

        <?php include 'footer.php'; ?>
</body>
</html>
                