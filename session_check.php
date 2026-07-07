<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !==true ) {
?>
<?php
include("header.php");
include("menu.php");
?>

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