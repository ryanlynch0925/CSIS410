<?php
if  (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("data.php");
require_once("functions.php");

$errorMessage = "";

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    if (isset($_SESSION["role"]) && $_SESSION["role"] == "administrator") {
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
        $password = $_POST["password"];
    }

    if ($username == ""|| $password == "") {
        $errorMessage = "Please enter both a username and password.";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute([":username" => $username
        ]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password_hash"])) {
            $_SESSION["authenticated"] = true;
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];
            $_SESSION["displayName"] = $user["first_name"] . " " . $user["last_name"];

            $updateLogin = $pdo->prepare("UPDATE users SET last_login_at = NOW() WHERE id = :id");
            $updateLogin->execute([":id" => $user["id"]]);

            if ($user["role"] == "administrator") {
                header("Location: admin.php");
                exit();
            } elseif ($user["role"] == "publisher") {
                header("Location: publisher.php");
                exit();
            } else {
                header("Location: account.php");
                exit();
            }
        } else {
            $errorMessage = "Invalid username or password.";
        }
    }
}

$pageTitle = "Login - Grace Bridge Mission";
$pageDescription = "Login page for Grace Bridge Missions customer, publisher and administrator accounts.";
$pageKeywords = "login, sessions, account, Grace Bridge Missions";

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Account Login</h2>

    <p>
        Log in to access your Grace Bridge Missions account. Customers can view their account, publishers can manage ministry content, and administrators can access the CMS dashboard.
    </p>

    <div class="noticeBox">
        <p>
            <strong>Practice Accounts:</strong><br />
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
            <input type="text" name="username" id="username" required />
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
        </p>

        <p>
            <input type="submit" value="Log In" />
        </p>
    </form>

    <p>
        New Users can test password strength on the <a href="register.php">registration page</a>
    </p>
</div>

<?php
include("footer.php");
?>
        </div>
    </body>
</html>