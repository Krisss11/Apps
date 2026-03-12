<?php
// central database connection

// show errors on development machine
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host    = 'localhost';
$db      = 'school_system';
$user    = 'root';      // default for XAMPP
$pass    = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // Uncomment the next line during debugging
    // echo "<div class='result'>Успешно свързване с базата данни!</div>";
} catch (PDOException $e) {
    // stop execution and show the error
    die('Грешка при свързване: ' . $e->getMessage());
}
