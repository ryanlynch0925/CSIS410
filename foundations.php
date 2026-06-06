<?php
$pageTitle = "Module 1 Foundations Assignment";
$pageDescription = "Foundations assignment page for the Aunt Lissa's Children's Closet website.";
$pageKeywords = "CSIS 410, foundations assignment, PHP, XHTML, CSS";
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
            <h1>Module 1: Foundations</h1>
            <p class="tagline">Building the starting structure for the course website.</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="foundations.php">Module 1 Foundations</a></li>
                <li><a href="orgchart.php">Module 1 Variables</a></li>
                <li><a href="#">Module 2 Forms</a></li>
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
            <h2>Foundations Assignment</h2>

            <p>
                This page represents the Module 1 Foundations Assignment for the CSIS 410
                web development course. The purpose of this assignment is to create the
                beginning structure for a Christian business website using XHTML, CSS,
                and PHP.
            </p>

            <p>
                The site includes a homepage, an About Us page, a PHP configuration page,
                and a Contact Us page. Future course assignments will be linked from the
                main menu as the website develops into a CMS and e-commerce project.
            </p>
        </div>

        <div class="footer">
            <p class="modified">
                Last modified:
                <?php echo date("F d, Y h:i A", filemtime(__FILE__)); ?>
            </p>

            <div class="validation">
                <p>
                    <a href="https://validator.w3.org/check?uri=referer">
                        <img src="https://www.w3.org/Icons/valid-xhtml10"
                             alt="Valid XHTML 1.0 Strict" height="31" width="88" />
                    </a>

                    <a href="https://jigsaw.w3.org/css-validator/check/referer">
                        <img src="https://jigsaw.w3.org/css-validator/images/vcss"
                             alt="Valid CSS" height="31" width="88" />
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>