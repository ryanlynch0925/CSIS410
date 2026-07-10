<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "mysql1002.site4now.net";
$dbname = "db_aca304_rlynch";
$username = "aca304_rlynch";
$password = "admin2026";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed.");
}
?>