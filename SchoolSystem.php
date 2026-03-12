<?php
$host = 'localhost';
$db   = 'school_system';
$user = 'root'; // По подразбиране в XAMPP
$pass = '';     // По подразбиране в XAMPP е празно
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "<div class='result'>Успешно свързване с базата данни!</div>";
} catch (\PDOException $e) {
     echo "<div class='error'>Грешка при свързване: " . $e->getMessage() . "</div>";
}

// ПРИМЕР: Извличане на всички ученици
$stmt = $pdo->query('SELECT first_name, last_name, average_grade FROM students order by average_grade desc');
while ($row = $stmt->fetch()) {
    echo $row['first_name'] . " " . $row['last_name'] . " - Успех: " . $row['average_grade'] . "<br>";
}
// Данните, които искаме да вмъкнем (обикновено идват от $_POST)
$firstName = 'Алекс';
$lastName = 'Георгиев';
$class = '11А';
$grade = 5.80;
$email = 'alex@example.com';

// 1. Подготвяме заявката с "плейсхолдъри" (въпросителни или именовани)
$sql = "INSERT INTO students (first_name, last_name, class_name, average_grade, email) 
        VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);

// 2. Изпълняваме заявката, като подаваме масив с реалните данни
if ($stmt->execute([$firstName, $lastName, $class, $grade, $email])) {
    echo "<div class='result'>Успешно добавен нов ученик!</div>";
}

