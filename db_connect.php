<?php
$host = "mysql1002.site4now.net";
$username = "aca304_rlynch";
$password = "admin2026";
$database = "db_aca304_rlynch";

$dbc = mysqli_connect($host, $username, $password, $database);

if (!$dbc) {
    die("Database connection failed: ". mysqli_connect_error());
}
?>