<?php
// use a central connection script
require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $pdo is created in db.php and will throw an exception on failure

    $name  = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    // make sure the table exists before inserting
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) DEFAULT NULL,
        phone VARCHAR(20) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    try {
        $stmt = $pdo->prepare('INSERT INTO users (name, email, phone) VALUES (?, ?, ?)');
        $stmt->execute([$name, $email, $phone]);
        echo "<p>Записът е добавен успешно!</p>";
    } catch (PDOException $e) {
        echo "<div class='error'>Грешка при добавяне: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="bg">
    <head>
        <meta charset="UTF-8">
        <title>DB Управление</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body> 
        <H2> Добавяне на запис</H2>
        <form action="add.php" method="post">
            <input type="text" name="name" placeholder="Име" required>
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="phone" placeholder="Телефон">
            <button type="submit">Добави</button>
    </body>
</html>