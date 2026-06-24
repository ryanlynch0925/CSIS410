<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");

$loggedOut = false;
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cancelLogout"])) {
    header("Location: account.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmLogout"])) {
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            "",
            time() -42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();

    $loggedOut = true;
    $message = "You have been logged out successfully";
}

$pageTitle = "Logout - Grace Bridge Missions";
$pageDescription = "Logout page for Grace Bridge Missions accounts.";
$pageKeywords = "logout, sessions, account, Grace Bridge Missions";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Logout</h2>

    <?php
    if ($loggedOut) {
        echo "<div class=\"success\"><p>" . cleanOutput($message) . "</p></div>";
        echo "<p><a href=\"login.php\">return to Login</a></p>";
    } else {
    ?>
        <p>
            Are you sure you want to log out of your Grace Bridge Missions account?
        </p>

        <form action="logout.php" method="post">
            <p >
                <input type="submit" name="confirmLogout" value="Confirm Logout" />
                <input type="submit" name="cancelLogout" value="Cancel" />
            </p>
        </form>
    <?php
    }
    ?> 
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>