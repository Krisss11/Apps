<?php
require_once __DIR__ . '/db.php';

// handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    if ($id > 0) {
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        if ($stmt->execute([$id])) {
            echo "<p>Записът е изтрит успешно.</p>";
        } else {
            echo "<div class='error'>Грешка при изтриване.</div>";
        }
    } else {
        echo "<div class='error'>Невалиден ID.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Изтриване на запис</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Изтриване на запис</h2>
<form action="delete.php" method="post">
    <input type="number" name="id" placeholder="ID на записа" required>
    <button type="submit">Изтрий</button>
</form>
</body>
</html>
