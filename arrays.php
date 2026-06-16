<?php
$pageTitle = "Module 3 Arrays Assignment";
$pageDescription = "Employee directory for Aunt Lissa's Grace Closet using PHP multidimensional arrays.";
$pageKeywords = "PHP arrays, PHP multidimensional arrays, employee directory, sorting, nested lists";

$employees = array(
    array(
        "firstName" => "Melissa",
        "lastName" => "Carter",
        "department" => "Leadership",
        "team" => "Executive Team",
        "email" => "melissa.carter@auntlissascloset.com",
        "phone" => "555-101-1001",
        "jobTitle" => "Founder and Executive Director",
        "favoriteVerse" => "Proverbs 3:5-6",
    ),
    array(
        "firstName" => "Grace",
        "lastName" => "Thompson",
        "department" => "Operations",
        "team" => "Inventory Team",
        "email" => "grace.thompson@auntlissascloset.com",
        "phone" => "555-101-1002",
        "jobTitle" => "Operations Manager",
        "favoriteVerse" => "Galatians 6:9",
    ),
    array(
        "firstName" => "David",
        "lastName" => "Lynch",
        "department" => "Leadership",
        "team" => "Technology Team",
        "email" => "david.lynn@auntlissascloset.com",
        "phone" => "555-101-1003",
        "jobTitle" => "Information Technology Manager",
        "favoriteVerse" => "Philippians 4:13",
    ),
    array(
        "firstName" => "Daniel",
        "lastName" => "Brooks",
        "department" => "Operations",
        "team" => "Fullfillment Team",
        "email" => "daniel.brooks@auntlissascloset.com",
        "phone" => "555-101-1004",
        "jobTitle" => "Fullfillment Manager",
        "favoriteVerse" => "Ephesians 6:12",
    ),
    array(
        "firstName" => "Anna",
        "lastName" => "Reed",
        "department" => "Customer Care",
        "team" => "Family Support Team",
        "email" => "anna.reed@auntlissascloset.com",
        "phone" => "555-101-1005",
        "jobTitle" => "Family Support Manager",
        "favoriteVerse" => "Isaiah 41:10",
    ),
    array(
        "firstName" => "Caleb",
        "lastName" => "Morris",
        "department" => "Customer Care",
        "team" => "Community Outreach Team",
        "email" => "caleb.morris@auntlissascloset.com",
        "phone" => "555-101-1006",
        "jobTitle" => "Community Outreach Manager",
        "favoriteVerse" => "Jeremiah 29:11",
    ),
);

function cleanOutput($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function compareByLastName($employeeA, $employeeB) {
    return strcmp($employeeA['lastName'], $employeeB['lastName']);
}

function compareByDepartment($employeeA, $employeeB) {
    $departmentCompare = strcmp($employeeA['department'], $employeeB['department']);

    if ($departmentCompare == 0) {
        return strcmp($employeeA['lastName'], $employeeB['lastName']);
    }

    return $departmentCompare;
}

function displayEmployeeTable($employeeList) {
    echo "<table class=\"resultsTable\">";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Department</th>";
    echo "<th>Team</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "<th>Job Title</th>";
    echo "<th>Favorite Verse</th>";
    echo "</tr>";

    foreach ($employeeList as $employee) {
        echo "<tr>";
        echo "<td>" . cleanOutput($employee['firstName']) . " " . cleanOutput($employee['lastName']) . "</td?";
        echo "<td>" . cleanOutput($employee['department']) . "</td>";
        echo "<td>" . cleanOutput($employee['team']) . "</td>";
        echo "<td>" . cleanOutput($employee['email']) . "</td>";
        echo "<td>" . cleanOutput($employee['phone']) . "</td>";
        echo "<td>" . cleanOutput($employee['jobTitle']) . "</td>";
        echo "<td>" . cleanOutput($employee['favoriteVerse']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

function displayNestedList($employeeList) {
    $groupedEmployees = array();

    foreach ($employeeList as $employee) {
        $department = $employee['department'];
        $team = $employee['team'];

        if (!isset($groupedEmployees[$department])) {
            $groupedEmployees[$department] = array();
        }

        if (!isset($groupedEmployees[$department][$team])) {
            $groupedEmployees[$department][$team] = array();
        }

        $groupedEmployees[$department][$team][] = $employee;
    }

    ksort($groupedEmployees);

    echo "<ul class=\"nestedDirectory\">";

    foreach ($groupedEmployees as $department => $teams) {
        echo "<li><strong>" . cleanOutput($department) . "</strong>";
        ksort($teams);

        echo "<ul>";

        foreach ($teams as $team => $teamEmployees) {
            echo "<li>" . cleanOutput($team);
            echo "<ul>";

            usort($teamEmployees, 'compareByLastName');

            foreach ($teamEmployees as $employee) {
                echo "<li>";
                echo cleanOutput($employee["firstName"]) . " " . cleanOutput($employee["lastName"]);
                echo " - " . cleanOutput($employee["jobTitle"]);
                echo " - " . cleanOutput($employee["email"]);
                echo "</li>";
            }

            echo "</ul>";
            echo "</li>";
        }

        echo "</ul>";
        echo "</li>";
    }

    echo "</ul>";
}

$view = "lastName";

if (isset($_GET["view"])) {
    $view = $_GET["view"];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title><?php echo $pageTitle; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="<?php echo $pageDescription; ?>" />
    <meta name="keywords" content="<?php echo $pageKeywords; ?>" />
    <link rel="stylesheet" type="text/css" href="styles.css?v=<?php echo filemtime('styles.css'); ?>" />
</head>

<body>
    <div id="container">
        <div class="header">
            <h1>Aunt Lissa's Grace Closet</h1>
            <p class="tagline">Module 3 Arrays Assignment</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="foundations.php">Module 1 Foundations</a></li>
                <li><a href="orgchart.php">Module 1 Variables</a></li>
                <li><a href="forms.php">Module 2 Forms</a></li>
                <li><a href="arrays.php">Module 3 Arrays</a></li>
                <li><a href="login.php">Module 4 Sessions</a></li>
                <li><a href="#">Module 5 CMS Sessions</a></li>
                <li><a href="#">Module 6 Database</a></li>
                <li><a href="#">Module 8 CMS Database</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="phpinfo.php">PHP Info</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="content">
            <h2>Employee Directory</h2>

            <p>
                This directory uses a PHP multidimensional array to store employee records. The records include each employee's name, department, team, email, phone number, job title, and favorite Bible verse.
            </p>

            <div class="subMenu">
                <p>
                    <a href="arrays.php?view=lastName">Employee List by Last Name</a>
                    <a href="arrays.php?view=department">Employee List by Department</a>
                    <a href="arrays.php?view=nested">Employee List by Department and Team</a>
                </p>
            </div>

            <?php
            if ($view == "department") {
                echo "<h3>Employees Sorted by Department</h3>";
                usort($employees, "compareByDepartment");
                displayEmployeeTable($employees);
            } elseif ($view == "nested") {
                echo "<h3> Employees Grouped by Department and Team</h3>";
                displayNestedList($employees);
            } else {
                echo "<h3>Employees Sorted by Last Name</h3>";
                displayEmployeeTable($employees);
            }
            ?>
        </div>

        <?php include("footer.php"); ?>
    </div>
</body>
</html>

