<?php
session_start();
$conn = new mysqli("localhost", "user", "password", "database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    
    $sql = "UPDATE your_table SET name='$name', description='$description' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: System.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM your_table WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
    <textarea name="description"><?php echo htmlspecialchars($row['description']); ?></textarea>
    <button type="submit">Save Changes</button>
</form>

<?php $conn->close(); ?>