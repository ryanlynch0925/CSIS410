<?php
$pageTitle = "Aunt Lissa's Grace Closet";
$pageDescription = "Aunt Lissa's Grace Closet is a non-profit organization dedicated to providing clothing and support to those in need. We believe that everyone deserves to feel confident and comfortable in their own skin, and we strive to make that a reality for our clients.";
$pageKeywords = "Aunt Lissa's Grace Closet, non-profit organization, clothing, support, confidence, comfort";
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
            <h1><?php echo $pageTitle; ?></h1>
            <p class="tagline">Providing clothing and support to those in need</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="foundations.php">Module 1 Foundations</a></li>
                <li><a href="orgchart.php">Module 1 Variables</a></li>
                <li><a href="forms.php">Module 2 Forms</a></li>
                <li><a href="#">Module 3 Arrays</a></li>
                <li><a href="#">Module 4 Sessions</a></li>
                <li><a href="#">Module 5 CMS Sessions</a></li>
                <li><a href="#">Module 6 Database</a></li>
                <li><a href="#">Module 8 CMS Database</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="phpinfo.php">PHP Info</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="content">
            <h2>Welcome to Aunt Lissa's Grace Closet!</h2>
            <p>Aunt Lissa's Grace Closet is a Christian online consignment store created to help families find affordable clothing and support. We believe that everyone deserves to feel confident and comfortable in their own skin, and we strive to make that a reality for our clients.</p>

            <div class="highlight">
                <p>This website will grow throughout the course of this class, so check back often to see new features and updates!</p>
            </div>

            <p>Thank you for visiting Aunt Lissa's Grace Closet. We hope to serve you and your family soon!</p>
        </div>

        <?php include 'footer.php'; ?>
    </div>
</body>
</html>