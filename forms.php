<?php
$pageTitle = "Module 2 Forms";
$pageDescription = "GET and POST product survey forms for Aunt Lissa's Grace Closet";
$pageKeywords = "PHP forms, GET method, POST method, product survey";
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
            <p class="tagline">Module 2 Forms Assignment</p>
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
            <h2>PHP, GET, and POST Methods</h2>

            <p>
                PHP is a server-side scripting language that processes form data and creates dynamic web pages.
            </p>
            <p>
                The GET method sends form information through the URL, which makes it useful for simple searches or non-pricate information.
            </p>
            <p>
                The POST method sends form information through the request body instead of the URL, which makes it better for longer form submission or information that should not be displayed in the address bar.
            </p>

            <h2>Product Survey Forms</h2>

            <p>
                Please choose one of the two product survey forms below. Both surveys rank three products that may be used later in the shopping cart projects.
            </p>

            <p><a href="get-poll.php">Complete the GET Product Survey</a></p>
            <p><a href="post-poll.php">Complete the POST Product Survey</a></p>
        </div>

        <div class="footer">
            <p class="modified">Last modified: <?php echo date("F d, Y h:i A", filemtime(__FILE__)); ?></p>

        <div class="validation">
            <p>
                <a href="https://validator.w3.org/check?uri=referer">
                    <img src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
                </a>

                <a href="https://jigsaw.w3.org/css-validator/check/referer">
                    <img src="https://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" height="31" width="88" />
                </a>
            </p>
        </div>
    </div>
</body>
</html>