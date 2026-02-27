<style>
    body { font-family: sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
    .container { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 350px; }
    input, select, button { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
    button { background: #28a745; color: white; border: none; cursor: pointer; font-size: 16px; }
    button:hover { background: #218838; }
    .result { margin-top: 15px; padding: 10px; background: #e9ecef; border-left: 5px solid #28a745; }
    .error { border-left-color: #dc3545; background: #ffe6e6; }
</style>

<div class="container">
<?php
    // Show messages only after the form is submitted (POST request)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Проверка на потребителското име и паролата
        if ($username === 'admin' && $password === 'password123') {
            echo '<div class="result">Успешен вход!</div>';
        } else {
            echo '<div class="result error">Грешно потребителско име или парола.</div>';
        }
    }
?>
    <h2>Вход</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Потребителско име" required>
        <input type="password" name="password" placeholder="Парола" required>
        <button type="submit" name="submit">Влез</button>
    </form>
</div>
