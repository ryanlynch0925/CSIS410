<?php
$lissaName = "Melissa Carter";
$lissaTitle = "Founder and Executive Director";
$lissaDepartment = "Leadership";
$lissaDegree = "B.S. in Christian Ministry";
$lissaFavoriteBook = "The Purpose Driven Life by Rick Warren";
$lissaHobbies = "Traveling, cooking, and spending time with family";
$lissaGoal = "To help families find affordable clothing while showing Christlike care.";
$lissaLink = "lissa-carter.php";
$lissaPhoto = "images/lissa-carter.png";

$graceName = "Grace Thompson";
$graceTitle = "Inventory and Donations Coordinator";
$graceDepartment = "Operations";
$graceDegree = "A.A. in Business Administration";
$graceFavoriteBook = "Redeeming Love by Francine Rivers";
$graceHobbies = "Gardening, hiking, and volunteering at local shelters";
$graceGoal = "To ensure that our inventory is well-organized and that donations are efficiently processed to serve our community.";
$graceLink = "grace-thompson.php";
$gracePhoto = "images/grace-thompson.png";

$danielName = "Daniel Brooks";
$danielTitle = "Online Store Manager";
$danielDepartment = "E-commerce";
$danielDegree = "B.S. in Information Technology";
$danielFavoriteBook = "Every Good Endeavor by Timothy Keller";
$danielHobbies = "Coding, gaming, and mentoring youth in technology";
$danielGoal = "To create a seamless online shopping experience that connects our customers with affordable clothing while sharing the love of Christ.";
$danielLink = "daniel-brooks.php";
$danielPhoto = "images/daniel-brooks.png";

function displayEmployeeCard($name, $title, $department, $link)
{
    echo "<div class=\"employeeCard\">";
    echo "<h3>$name</h3>";
    echo "<p><strong>Title:</strong> " . $title . "</p>";
    echo "<p><strong>Department:</strong> " . $department . "</P>";
    echo "<p><a href=\"" . $link . "\">View Employee Profile</a></p>";
    echo "</div>";
}

function displayEmployeeProfile($name, $title, $department, $degree, $favoriteBook, $hobbies, $goal, $photo)
{
    echo "<div class=\"employeeProfile\">";
    echo "<img class=\"employeePhoto\" src=\"" . $photo . "\" alt=\"AI generated photo of " . $name . "\" />";
    echo "<h2>" . $name . "</h2>";
    echo "<p><strong>Job Title:</strong> " . $title . "</p>";
    echo "<p><strong>Department:</strong> " . $department . "</p>";
    echo "<p><strong>Degree:</strong> " . $degree . "</p>";
    echo "<p><strong>Favorite Book:</strong> " . $favoriteBook . "</p>";
    echo "<p><strong>Hobbies:</strong> " . $hobbies . "</p>";
    echo "<p><strong>Goal:</strong> " . $goal . "</p>";
    echo "</div>";
}
?>