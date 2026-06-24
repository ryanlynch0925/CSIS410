<?php
if  (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("data.php");
include("functions.php");

$errorMessage = "";

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
        header("Location: admin.php");
        exit();
    } elseif (isset($_SESSION["role"]) && $_SESSION["role"] == "publisher") {
        header("Location: publisher.php");
        exit();
    } else {
        header("Location: account.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "";
    $password = "";

    if (isset($_POST["username"])) {
        $username = trim($_POST["username"]);
    }

    if (isset($_POST["password"])) {
        $password = trim($_POST["password"]);
    }

    if ($username == ""|| $password == "") {
        $errorMessage = "Please enter both an username and password";
    }

    elseif (isset($users[$username]) && $users[$username]["password"] == $password) {
        $_SESSION["authenticated"] = true;
        $_SESSION["username"] = $users[$username]["username"];
        $_SESSION["role"] = $users[$username]["role"];
        $_SESSION["displayName"] = $users[$username]["displayName"];

        if ($_SESSION["role"] == "admin")  {
            header("Location: admin.php");
            exit();
        } elseif ($_SESSION["role"] == "publisher")  {
            header("Location: publisher.php");
            exit();
        } else {
            header("Location: account.php");
            exit();
        }
    }

    else {
        $errorMessage = "Invalid username or password. Please try again.";
    }
}

$pageTitle = "Login - Grace Bridge Mission";
$pageDescription = "Login page for Grace Bridge Missions Customer, publisherm and administrator accounts.";
$pageKeywords = "login, sessions, account, Grace Bridge Missions";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Account Login</h2>

    <p>
        Log in to access your Grace Bridge Missions account. Customers can view their account, publishers can manage ministry content, and administrators can acccess the CMS dashboard.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Prectice Accounts:</strong><br />
            Customer: customer / Customer123! <br />
            Publisher: publisher / Publisher123! <br />
            Admin: admin / Admin123! <br />
        </p>
    </div>

    <?php
    if ($errorMessage != "") {
        echo "<div class=\"error\"><p>" . cleanOutput($errorMessage) . "</p></div>";
    }
    ?>

    <form action="login.php" method="post">
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" />
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
        </p>

        <p>
            <input type="submit" value="Log In" />
        </p>
    </form>

    <P>
        New Users can test password strenth on the <a href="register.php">registration page</a>
    </P>
</div>

<?php
include("footer.php");
?>
        </div>
    </body>
</html>