<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");

$pageTitle = "Mission Application - Grace Bridge Missions";
$pageDescription = "Mission application form for Grace Bridge Missions.";
$pageKeywords = "mission application, outreach, form validation, Grace Bridge Missions";

$formSubmitted = false;
$passedValidation = false;
$errors = array();

$fullName = "";
$email = "";
$phone = "";
$missionArea = "";
$availability = "";
$experienceLevel = "";
$statementText = "";

$missionAreas = array(
    "Local Outreach",
    "Missionary Support",
    "Children's Ministry",
    "Discipleship Resources"
);

$experienceLevels = array(
    "Beginner",
    "Some Experience",
    "Experienced",
    "Ministry Leader"
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formSubmitted = true;

    if (isset($_POST["fullName"])) {
        $fullName = trim($_POST["fullName"]);
    }

    if (isset($_POST["email"])) {
        $email = trim($_POST["email"]);
    }

    if (isset($_POST["phone"])) {
        $phone = trim($_POST["phone"]);
    }

    if (isset($_POST["missionArea"])) {
        $missionArea = trim($_POST["missionArea"]);
    }

    if (isset($_POST["availability"])) {
        $availability = trim($_POST["availability"]);
    }

    if (isset($_POST["experienceLevel"])) {
        $experienceLevel = trim($_POST["experienceLevel"]);
    }

    if (isset($_POST["statementText"])) {
        $statementText = trim($_POST["statementText"]);
    }

    if ($fullName == "") {
        $errors[] = "Full name is required.";
    }

    if ($email == "") {
        $errors[] = "Email address is required.";
    } elseif (!emailIsValidBasic($email)) {
        $errors[] = "Email address must contain an @ symbol.";
    }

    if ($phone == "") {
        $errors[] = "Phone number is required.";
    } elseif (!numbersOnly($phone)) {
        $errors[] = "Phone number must contain numbers only.";
    }

    if ($missionArea == "") {
        $errors[] = "Please select a mission area.";
    }

    if ($availability == "") {
        $errors[] = "Availability is required.";
    }

    if ($experienceLevel == "") {
        $errors[] = "Please select an experience level.";
    }

    if ($statementText == "") {
        $errors[] = "Please explain why you want to serve with Grace Bridge Missions.";
    }

    if (count($errors) == 0) {
        $passedValidation = true;
    }
}

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Mission Application</h2>

    <p>
        Grace Bridge Missions welcomes people who desire to serve others in the name of Christ.
        This application form helps match volunteers with mission areas that fit their gifts,
        availability, and ministry experience.
    </p>

    <div class="noticeBox">
        <p>
            This practice application validates the submitted information, but it does not save
            the application to a file or database yet.
        </p>
    </div>

    <?php
    if ($formSubmitted && $passedValidation) {
        echo "<div class=\"success\">";
        echo "<p><strong>Your mission application passed validation.</strong></p>";
        echo "<p>No application was saved because this sessions project does not use a database yet.</p>";
        echo "<p><strong>Name:</strong> " . cleanOutput($fullName) . "</p>";
        echo "<p><strong>Email:</strong> " . cleanOutput($email) . "</p>";
        echo "<p><strong>Phone:</strong> " . cleanOutput($phone) . "</p>";
        echo "<p><strong>Mission Area:</strong> " . cleanOutput($missionArea) . "</p>";
        echo "<p><strong>Availability:</strong> " . cleanOutput($availability) . "</p>";
        echo "<p><strong>Experience Level:</strong> " . cleanOutput($experienceLevel) . "</p>";
        echo "</div>";
    }

    if ($formSubmitted && !$passedValidation) {
        echo "<div class=\"error\">";
        echo "<p><strong>The mission application did not pass validation.</strong></p>";
        echo "<ul>";

        foreach ($errors as $error) {
            echo "<li>" . cleanOutput($error) . "</li>";
        }

        echo "</ul>";
        echo "</div>";
    }
    ?>

    <form action="application.php" method="post">
        <p>
            <label for="fullName">Full Name:</label>
            <input type="text" name="fullName" id="fullName" value="<?php echo cleanOutput($fullName); ?>" />
        </p>

        <p>
            <label for="email">Email Address:</label>
            <input type="text" name="email" id="email" value="<?php echo cleanOutput($email); ?>" />
        </p>

        <p>
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" value="<?php echo cleanOutput($phone); ?>" />
        </p>

        <p>
            <label for="missionArea">Preferred Mission Area:</label>
            <select name="missionArea" id="missionArea">
                <option value="">Select One</option>
                <?php
                foreach ($missionAreas as $area) {
                    echo "<option value=\"" . cleanOutput($area) . "\"";

                    if ($missionArea == $area) {
                        echo " selected=\"selected\"";
                    }

                    echo ">" . cleanOutput($area) . "</option>";
                }
                ?>
            </select>
        </p>

        <p>
            <label for="availability">Availability:</label>
            <input type="text" name="availability" id="availability" value="<?php echo cleanOutput($availability); ?>" />
        </p>

        <p>
            <label for="experienceLevel">Experience Level:</label>
            <select name="experienceLevel" id="experienceLevel">
                <option value="">Select One</option>
                <?php
                foreach ($experienceLevels as $level) {
                    echo "<option value=\"" . cleanOutput($level) . "\"";

                    if ($experienceLevel == $level) {
                        echo " selected=\"selected\"";
                    }

                    echo ">" . cleanOutput($level) . "</option>";
                }
                ?>
            </select>
        </p>

        <p>
            <label for="statementText">Why do you want to serve?</label>
            <textarea name="statementText" id="statementText" rows="6" cols="40"><?php echo cleanOutput($statementText); ?></textarea>
        </p>

        <p>
            <input type="submit" value="Submit Mission Application" />
        </p>
    </form>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>