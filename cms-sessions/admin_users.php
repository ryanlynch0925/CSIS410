<?php
$allowedRoles = array("administrator");

include("session_check.php");
include("functions.php");
include("data.php");

$pageTitle = "Admin User Management - Grace Bridge Missions";
$pageDescription = "Administrator user management page for Grace Bridge Missions CMS.";
$pageKeywords = "admin, users, account management, database, Grace Bridge Missions";

$message = "";
$errorMessage = "";

$currentUserId = 0;

if (isset($_SESSION["user_id"])) {
    $currentUserId = (int)$_SESSION["user_id"];
}

/*
    Add new user.
*/
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addUser"])) {
    $firstName = trim($_POST["firstName"] ?? "");
    $lastName = trim($_POST["lastName"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $role = trim($_POST["role"] ?? "customer");

    $allowedUserRoles = array("customer", "publisher", "administrator");

    if ($firstName == "" || $lastName == "" || $username == "" || $email == "" || $password == "") {
        $errorMessage = "Please complete all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Please enter a valid email address.";
    } elseif (!in_array($role, $allowedUserRoles)) {
        $errorMessage = "Please choose a valid role.";
    } elseif (strlen($password) < 8) {
        $errorMessage = "Password must be at least 8 characters.";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errorMessage = "Password must include at least one uppercase letter.";
    } elseif (!preg_match("/[a-z]/", $password)) {
        $errorMessage = "Password must include at least one lowercase letter.";
    } elseif (!preg_match("/[0-9]/", $password)) {
        $errorMessage = "Password must include at least one number.";
    } elseif (!preg_match("/[^A-Za-z0-9]/", $password)) {
        $errorMessage = "Password must include at least one special character.";
    } else {
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
                    :role
                )
            ");

            $insertStatement->execute([
                ":first_name" => $firstName,
                ":last_name" => $lastName,
                ":username" => $username,
                ":email" => $email,
                ":password_hash" => $passwordHash,
                ":role" => $role
            ]);

            $message = "The user account was added successfully.";
        } catch (PDOException $e) {
            $errorMessage = "The user could not be added. The username or email may already exist.";
        }
    }
}

/*
    Update user role.
*/
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateUser"])) {
    $userId = trim($_POST["userId"] ?? "");
    $role = trim($_POST["role"] ?? "");

    $allowedUserRoles = array("customer", "publisher", "administrator");

    if (!numbersOnly($userId)) {
        $errorMessage = "The selected user could not be found.";
    } elseif (!in_array($role, $allowedUserRoles)) {
        $errorMessage = "Please choose a valid role.";
    } else {
        $updateStatement = $pdo->prepare("
            UPDATE users
            SET role = :role
            WHERE id = :id
        ");

        $updateStatement->execute([
            ":role" => $role,
            ":id" => (int)$userId
        ]);

        $message = "The user role was updated successfully.";
    }
}

/*
    Delete user.
    Required demo accounts are protected so you do not accidentally delete the accounts required by the assignment.
*/
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteUser"])) {
    $userId = trim($_POST["userId"] ?? "");

    if (!numbersOnly($userId)) {
        $errorMessage = "The selected user could not be deleted.";
    } elseif ((int)$userId == $currentUserId) {
        $errorMessage = "You cannot delete your own account while logged in.";
    } else {
        $checkStatement = $pdo->prepare("
            SELECT username
            FROM users
            WHERE id = :id
            LIMIT 1
        ");

        $checkStatement->execute([
            ":id" => (int)$userId
        ]);

        $userToDelete = $checkStatement->fetch();

        if (!$userToDelete) {
            $errorMessage = "The selected user could not be found.";
        } elseif (
            $userToDelete["username"] == "admin" ||
            $userToDelete["username"] == "publisher" ||
            $userToDelete["username"] == "customer"
        ) {
            $errorMessage = "The required assignment accounts cannot be deleted.";
        } else {
            $deleteStatement = $pdo->prepare("
                DELETE FROM users
                WHERE id = :id
            ");

            $deleteStatement->execute([
                ":id" => (int)$userId
            ]);

            $message = "The user account was deleted successfully.";
        }
    }
}

/*
    Pull users from database.
*/
$userStatement = $pdo->query("
    SELECT
        id,
        first_name,
        last_name,
        username,
        email,
        role,
        last_login_at,
        created_at
    FROM users
    ORDER BY role, username
");

$users = $userStatement->fetchAll();

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Admin User Management</h2>

    <p>
        Administrators can add users, update account roles, and remove non-required accounts.
        User data is stored in the database.
    </p>

    <?php
    if ($message != "") {
        echo "<div class=\"success\"><p>" . cleanOutput($message) . "</p></div>";
    }

    if ($errorMessage != "") {
        echo "<div class=\"error\"><p>" . cleanOutput($errorMessage) . "</p></div>";
    }
    ?>

    <div class="dashboardBox">
        <h3>Add New User</h3>

        <form action="admin_users.php" method="post">
            <p>
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" required />
            </p>

            <p>
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName" required />
            </p>

            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required />
            </p>

            <p>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required />
            </p>

            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required />
            </p>

            <p class="smallNote">
                Password must be at least 8 characters and include uppercase, lowercase, number, and special character.
            </p>

            <p>
                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="customer">Customer</option>
                    <option value="publisher">Publisher</option>
                    <option value="administrator">Administrator</option>
                </select>
            </p>

            <p>
                <input type="submit" name="addUser" value="Add User" />
            </p>
        </form>
    </div>

    <div class="dashboardBox">
        <h3>Existing Users</h3>

        <table>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Last Login</th>
                <th>Update Role</th>
                <th>Delete</th>
            </tr>

            <?php
            if (count($users) > 0) {
                foreach ($users as $user) {
                    echo "<tr>";

                    echo "<td>" . cleanOutput($user["first_name"] . " " . $user["last_name"]) . "</td>";
                    echo "<td>" . cleanOutput($user["username"]) . "</td>";
                    echo "<td>" . cleanOutput($user["email"]) . "</td>";
                    echo "<td>" . cleanOutput($user["role"]) . "</td>";

                    if ($user["last_login_at"] != "") {
                        echo "<td>" . cleanOutput($user["last_login_at"]) . "</td>";
                    } else {
                        echo "<td>Not logged in yet</td>";
                    }

                    echo "<td>";
                    echo "<form action=\"admin_users.php\" method=\"post\">";
                    echo "<input type=\"hidden\" name=\"userId\" value=\"" . cleanOutput($user["id"]) . "\" />";
                    echo "<select name=\"role\">";

                    echo "<option value=\"customer\"";
                    if ($user["role"] == "customer") echo " selected";
                    echo ">Customer</option>";

                    echo "<option value=\"publisher\"";
                    if ($user["role"] == "publisher") echo " selected";
                    echo ">Publisher</option>";

                    echo "<option value=\"administrator\"";
                    if ($user["role"] == "administrator") echo " selected";
                    echo ">Administrator</option>";

                    echo "</select>";
                    echo "<input type=\"submit\" name=\"updateUser\" value=\"Update\" />";
                    echo "</form>";
                    echo "</td>";

                    echo "<td>";
                    echo "<form action=\"admin_users.php\" method=\"post\">";
                    echo "<input type=\"hidden\" name=\"userId\" value=\"" . cleanOutput($user["id"]) . "\" />";
                    echo "<input type=\"submit\" name=\"deleteUser\" value=\"Delete\" />";
                    echo "</form>";
                    echo "</td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan=\"7\">No users found.</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <p>
        <a href="admin.php">Return to Admin Dashboard</a>
    </p>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>