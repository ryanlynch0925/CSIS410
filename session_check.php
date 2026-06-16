<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !==true ) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Not Authenticated</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="refresh" content="3;url=login.php" />
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo filemtime('styles.css'); ?>" />
</head>

<body>
    <div id="container">
        <div class="header">
            <h1>Aunt Lissa's Grace Closet</h1>
            <p class="tagline">Authentication Required</p>
        </div>

        <div class="content">
            <h2>Not Aunthenticated</h2>
            <p>You are not authenticated to view this page.</p>
            <p>You will be directed to the login page shortly.</p>
            <p><a href="login.php">Go to Login Page</a></p>
        </div>

        <?php include("footer.php"); ?>
    </div> 
</body>
</html>
<?php
    exit();        
}
?>