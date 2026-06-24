<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");

$pageTitle = "Register - Grace Bridge Missions";
$pageDescription = "Registration validation page for Grace Bridge Missions users.";
$pageKeywords = "registration, password validation, forms, Grace Bridge Missions";

$formSubmitted = false;
$passedValidation = false;
$errors = array();

$fullName = "";
$email = "";
$username = "";
$password = "";
$confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formSubmitted = true;

    if (isset($_POST["fullName"])) {
        $fullName = trim($_POST["fullName"]);
    }
    if (isset($_POST["email"])) {
        $email = trim($_POST["email"]);
    }
    if (isset($_POST["username"])) {
        $username = trim($_POST["username"]);
    }
    if (isset($_POST["password"])) {
        $password = trim($_POST["password"]);
    }
    if (isset($_POST["confirmPassword"])) {
        $confirmPassword = trim($_POST["confirmPassword"]);
    }

    if ($fullName == "") {
        $errors[] = "Full name is required.";
    }

    if ($email == "") {
        $errors[] = "Email address is required.";
    } elseif (!emailIsValidBasic($email)) {
        $errors[] = "Email address must contain an @ symbol.";
    }

    if ($username == "") {
        $errors[] = "Username is required.";
    }
    if ($password == "") {
        $errors[] = "Password is required.";
    } elseif (!passwordIsStrong($password)) {
        $errors[] = "Password must be at least 8 characters and include an uppercase letter, lowercase letter, number, and special character.";
    }
    if ($confirmPassword == "") {
        $errors[] = "Please confirm your password.";
    } elseif ($password != $confirmPassword) {
        $errors[] = "Password and confirm password must match.";
    }

    if ( count($errors) == 0) {
        $passedValidation = true;
    }
}

include("header.php");
include("menu.php");

?>

<div class="content">
    <h2>User Registration</h2>

    <p>
        Use this page to test account registration validation for Grace Bridge Missions.
        This practice form checks the login and password information, but it does not save
        the account to a file or database.
    </p>

    <div class="noticeBox">
        <p>
            Passwords must include at least 8 characters, one uppercase letter,
            one lowercase letter, one number, and one special character.
        </p>
    </div>

    <?php
    if ($formSubmitted && $passedValidation) {
        echo "<div class=\"success\">";
        echo "<p><strong>Registration verification passed.</strong></p>";
        echo "<p>The login and password information passed validation. No account was saved because this sessions assignment does not use a database yet.</p>";
        echo "<p><strong>Name:</strong> " . cleanOutput($fullName) . "</p>";
        echo "<p><strong>Email:</strong> " . cleanOutput($email) . "</p>";
        echo "<p><strong>Username:</strong> " . cleanOutput($username) . "</p>";
        echo "</div>";
    }

    if ($formSubmitted && !$passedValidation) {
        echo "<div class=\"error\">";
        echo "<p><strong>Registration verification did not pass.</strong></p>";
        echo "<ul>";

        foreach ($errors as $error) {
            echo "<li>" . cleanOutput($error) . "</li>";
        }

        echo "</ul>";
        echo "</div>";
    }
    ?>

    <form action="register.php" method="post">
        <p>
            <label for="fullName">Full Name:</label>
            <input type="text" name="fullName" id="fullName" value="<?php echo cleanOutput($fullName); ?>" />
        </p>
        <p>
            <label for="email">Email Address:</label>
            <input type="text" name="email" id="email" value="<?php echo cleanOutput($email); ?>" />
        </p>
        <p>
            <label for="username">Desired Username:</label>
            <input type="text" name="username" id="username" value="<?php echo cleanOutput($username); ?>" />
        </p>
        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
        </p>
        <p>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword" id="confirmPassword" />
        </p>

        <p>
            <input type="submit" value="Check Registration" />
        </p>
    </form>

    <p>
        Already have an account? <a href="login.php">Log in here</a>
    </p>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>