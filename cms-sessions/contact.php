<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("functions.php");

$pageTitle = "Contact - Grace Bridge Missions";
$pageDescription = "Contact form for Grace Bridge Missions.";
$pageKeywords = "contact, form, validation, missions, Grace Bridge Missions";

$formSubmitted = false;
$passedValidation = false;
$errors = array();

$fullName = "";
$email = "";
$phone = "";
$subject = "";
$messageText = "";
$preferredContact = "";

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

    if (isset($_POST["subject"])) {
        $subject = trim($_POST["subject"]);
    }

    if (isset($_POST["messageText"])) {
        $messageText = trim($_POST["messageText"]);
    }

    if (isset($_POST["preferredContact"])) {
        $preferredContact = trim($_POST["preferredContact"]);
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

    if ($subject == "") {
        $errors[] = "Subject is required.";
    }

    if ($messageText == "") {
        $errors[] = "Message is required.";
    }

    if ($preferredContact == "") {
        $errors[] = "Please select a preferred contact method.";
    }

    if (count($errors) == 0) {
        $passedValidation = true;
    }
}

include("header.php");
include("menu.php");
?>

<div class="content">
    <h2>Contact Grace Bridge Missions</h2>

    <p>
        Use this form to contact Grace Bridge Missions about prayer support,
        ministry partnerships, product questions, or mission opportunities.
    </p>

    <div class="noticeBox">
        <p>
            Grace Bridge Missions wants every message to be handled with care,
            honesty, and a heart for serving others in Christ.
        </p>
    </div>

    <?php
    if ($formSubmitted && $passedValidation) {
        echo "<div class=\"success\">";
        echo "<p><strong>Your contact form passed validation.</strong></p>";
        echo "<p>This practice form does not send an email or save to a database yet.</p>";
        echo "<p><strong>Name:</strong> " . cleanOutput($fullName) . "</p>";
        echo "<p><strong>Email:</strong> " . cleanOutput($email) . "</p>";
        echo "<p><strong>Phone:</strong> " . cleanOutput($phone) . "</p>";
        echo "<p><strong>Subject:</strong> " . cleanOutput($subject) . "</p>";
        echo "<p><strong>Preferred Contact:</strong> " . cleanOutput($preferredContact) . "</p>";
        echo "</div>";
    }

    if ($formSubmitted && !$passedValidation) {
        echo "<div class=\"error\">";
        echo "<p><strong>The contact form did not pass validation.</strong></p>";
        echo "<ul>";

        foreach ($errors as $error) {
            echo "<li>" . cleanOutput($error) . "</li>";
        }

        echo "</ul>";
        echo "</div>";
    }
    ?>

    <form action="contact.php" method="post">
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
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" value="<?php echo cleanOutput($subject); ?>" />
        </p>

        <p>
            <label for="preferredContact">Preferred Contact Method:</label>
            <select name="preferredContact" id="preferredContact">
                <option value="">Select One</option>
                <option value="Email"<?php if ($preferredContact == "Email") { echo " selected=\"selected\""; } ?>>Email</option>
                <option value="Phone"<?php if ($preferredContact == "Phone") { echo " selected=\"selected\""; } ?>>Phone</option>
                <option value="Either"<?php if ($preferredContact == "Either") { echo " selected=\"selected\""; } ?>>Either</option>
            </select>
        </p>

        <p>
            <label for="messageText">Message:</label>
            <textarea name="messageText" id="messageText" rows="6" cols="40"><?php echo cleanOutput($messageText); ?></textarea>
        </p>

        <p>
            <input type="submit" value="Submit Contact Form" />
        </p>
    </form>
</div>

<?php
include("footer.php");
?>

        </div>
    </body>
</html>