<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = "Logout";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["confirmLogout"])) {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
        );
    }

    session_destroy();
    $loggedOut = true;
    } else {
        header("Location: orgchart.php");
        exit();
    }    
} else {
    $loggedOut = false;
}
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
            <p class="tagline">Logout Confirmation</p>
        </div>

        <div class="content">
            <?php
            if ($loggedOut) {
                echo "<h2> You have been logged out.</h2>";
                echo "<p>Your session has been destroyed.</p>";
                echo "<p><a href=\"login.php\">Return to Login Page</a></p>";
            } else {
            ?>
                <h2>Confirm Logout</h2>
                <p>Are you sure you want to log out?</p>

                <form action="logout.php" method="post">
                    <p>
                        <input type="submit" name="confirmLogout" value="Confirm Logout" />
                        <input type="submit" name="cancelLogout" value="Cancel" />
                    </p>
                </form>
            <?php
            }
            ?>
        </div>

        <?php include("footer.php"); ?>
    </div>
</body>
</html>