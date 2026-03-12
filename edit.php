<?php
require_once __DIR__ . '/db.php';
session_start();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    $stmt = $pdo->prepare('UPDATE your_table SET name = ?, description = ? WHERE id = ?');
    if ($stmt->execute([$name, $description, $id])) {
        header('Location: System.php');
        exit();
    } else {
        echo "Error updating record";
    }
} else {
    $stmt = $pdo->prepare('SELECT * FROM your_table WHERE id = ?');
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}
?>

<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
    <textarea name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>
    <button type="submit">Save Changes</button>
</form>

<?php $conn->close(); ?>