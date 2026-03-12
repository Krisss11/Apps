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
        </form>
        <a><br></a>
        <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $pdo = new PDO($dsn, $user, $pass, $options);
            } catch (\PDOException $e) {
                die("Грешка при свързване: " . $e->getMessage());
            }

            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

        
                // Check if user already exists by email
                $checkStmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE email = ?');
                $checkStmt->execute([$email]);
                $exists = $checkStmt->fetchColumn();
                
                if ($exists > 0) {
                    die("Грешка: Потребител с този email вече съществува!");
                } else {
                
                $stmt = $pdo->prepare('INSERT INTO users (name, email, phone) VALUES (?, ?, ?)');
                $stmt->execute([$name, $email, $phone]);
                echo "<TABLE style='border: 1px solid black; border-collapse: collapse;'>
                    <TR>
                        <TD>Успешно добавен запис:</TD>
                    </TR>
                    <TR>
                        <TD>Име: $name</TD>
                    </TR>
                    <TR>
                        <TD>Email: $email</TD>
                    </TR>
                    <TR>
                        <TD>Телефон: $phone</TD>
                    </TR>
                    </TABLE>";
                }
            
        }
        ?>
    </body>
</html>

