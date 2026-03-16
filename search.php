<?php
$host = 'localhost';
$db   = 'school_system';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Грешка при свързване: " . $e->getMessage());
}

$name = $_GET['name'] ?? '';

if ($name) {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE name LIKE ?');
    $stmt->execute(['%' . $name . '%']);
    $results = $stmt->fetchAll();
} 
else if ($name) {
    $stmt = $pdo->prepare('SELECT * FROM students WHERE name LIKE ?');
    $stmt->execute(['%' . $name . '%']);
    $results = $stmt->fetchAll();
} else {
    $results = [];
}
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Резултати от търсене</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Резултати от търсене</h2>
    <?php if ($results): ?>
        <ul>
            <?php foreach ($results as $user): ?>
                <li><?php echo htmlspecialchars($user['name']) . ' - ' . htmlspecialchars($user['email']) . ' - ' . htmlspecialchars($user['phone']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Няма намерени резултати.</p>
    <?php endif; ?>
    <a href="system.php">Обратно</a>
</body>
</html>