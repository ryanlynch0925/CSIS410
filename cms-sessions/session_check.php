<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$accessAllowed = true;
$messageTitle = "";
$messageText = "";
$redirectTarget = "login.php";

if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    $accessAllowed = false;
    $messageTitle = "Not Authenticated";
    $messageText = "You must log in before viewing this page.";
    $redirectTarget = "login.php";
}

if ($accessAllowed && isset($allowedRoles) && is_array($allowedRoles)) {
    $roleAllowed = false;

    foreach ($allowedRoles as $role) {
        if(isset($_SESSION["role"]) && $_SESSION["role"] == $role) {
            $roleAllowed = true;
        }
    }

    if (!$roleAllowed) {
        $accessAllowed = false;
        $messageTitle = "Access Restricted";
        $messageText = "Your account does not have permission to view this page.";
        $redirectTarget = "account.php";
    }
}

if (!$accessAllowed) {
    header("refresh:3;url=" . $redirectTarget);

    $pageTitle = $messageTitle;
    $pageDescription = "Grace Bridge Missions session access message.";
    $pageKeywords = "sessions, login, access control";

    include("header.php");
    include("menu.php");
    ?>

    <div class="content">
        <h2><?php echo $messageTitle; ?></h2>
        <p><?php echo $messageText; ?></p>
        <p>You will be redirected shortly.</p>
        <p><a href="<?php echo $redirectTarget; ?>">Continue</a></p>
    </div>

    <?php
    include("footer.php");
    ?>
        </div>
    </body>
</html>

    <?php
    exit();
}