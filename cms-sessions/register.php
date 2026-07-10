<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");
include("data.php");

$pageTitle = "Register - Grace Bridge Missions";
$pageDescription = "Database registration page for Grace Bridge Missions users.";
$pageKeywords = "registration, password validation, database, Grace Bridge Missions";

$formSubmitted = false;
$passedValidation = false;
$accountCreated = false;
$errors = array();

$firstName = "";
$lastName = "";
$email = "";
$username = "";
$password = "";
$confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formSubmitted = true;

    if (isset($_POST["firstName"])) {
        $firstName = trim($_POST["firstName"]);
    }

    if (isset($_POST["lastName"])) {
        $lastName = trim($_POST["lastName"]);
    }

    if (isset($_POST["email"])) {
        $email = trim($_POST["email"]);
    }

    if (isset($_POST["username"])) {
        $username = trim($_POST["username"]);
    }

    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    if (isset($_POST["confirmPassword"])) {
        $confirmPassword = $_POST["confirmPassword"];
    }

    if ($firstName == "") {
        $errors[] = "First name is required.";
    }

    if ($lastName == "") {
        $errors[] = "Last name is required.";
    }

    if ($email == "") {
        $errors[] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
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

    if (count($errors) == 0) {
        $checkStatement = $pdo->prepare("
            SELECT id
            FROM users
            WHERE username = :username
            OR email = :email
            LIMIT 1
        ");

        $checkStatement->execute([
            ":username" => $username,
            ":email" => $email
        ]);

        $existingUser = $checkStatement->fetch();

        if ($existingUser) {
            $errors[] = "That username or email address is already registered.";
        }
    }

    if (count($errors) == 0) {
        $passedValidation = true;

        try {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $insertStatement = $pdo->prepare("
                INSERT INTO users (
                    first_name,
                    last_name,
                    username,
                    email,
                    password_hash,
                    role
                )
                VALUES (
                    :first_name,
                    :last_name,
                    :username,
                    :email,
                    :password_hash,
                    'customer'
                )
            ");

            $insertStatement->execute([
                ":first_name" => $firstName,
                ":last_name" => $lastName,
                ":username" => $username,
                ":email" => $email,
                ":password_hash" => $passwordHash
            ]);

            $accountCreated = true;

            $firstName = "";
            $lastName = "";
            $email = "";
            $username = "";
        } catch (PDOException $e) {
            $errors[] = "The account could not be created. Please try a different username or email address.";
            $passedValidation = false;
            $accountCreated = false;
        }
    }
}

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>User Registration</h2>

    <p>
        Use this page to create a Grace Bridge Missions customer account.
        New accounts are stored in the database and are assigned the customer role.
    </p>

    <div class="noticeBox">
        <p>
            Passwords must include at least 8 characters, one uppercase letter,
            one lowercase letter, one number, and one special character.
        </p>
    </div>

    <?php
    if ($formSubmitted && $accountCreated) {
        echo "<div class=\"success\">";
        echo "<p><strong>Registration successful.</strong></p>";
        echo "<p>Your customer account was created and saved in the database.</p>";
        echo "<p><a href=\"login.php\">Log in to your new account</a></p>";
        echo "</div>";
    }

    if ($formSubmitted && count($errors) > 0) {
        echo "<div class=\"error\">";
        echo "<p><strong>Registration did not pass.</strong></p>";
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
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName" value="<?php echo cleanOutput($firstName); ?>" required />
        </p>

        <p>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName" value="<?php echo cleanOutput($lastName); ?>" required />
        </p>

        <p>
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" value="<?php echo cleanOutput($email); ?>" required />
        </p>

        <p>
            <label for="username">Desired Username:</label>
            <input type="text" name="username" id="username" value="<?php echo cleanOutput($username); ?>" required />
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
        </p>

        <p>
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword" id="confirmPassword" required />
        </p>

        <p>
            <input type="submit" value="Create Account" />
        </p>
    </form>

    <p>
        Already have an account? <a href="login.php">Log in here</a>.
    </p>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>