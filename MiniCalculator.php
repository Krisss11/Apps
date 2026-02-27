<div class="container">
    <h2>Калкулатор</h2>
    <form method="GET" autocomplete="off">
        <input type="number" name="num1" placeholder="Число 1" required step="any">
        <input type="number" name="num2" placeholder="Число 2" required step="any">
        <select name="operation">
            <option value="add">Събиране (+)</option>
            <option value="sub">Изваждане (-)</option>
            <option value="mul">Умножение (*)</option>
            <option value="div">Деление (/)</option>
 </select>
        <button type="submit" name="calc">Изчисли</button>
    </form>
</div>

<?php
if (isset($_GET['calc']) && isset($_GET['num1']) && isset($_GET['num2']) && isset($_GET['operation'])) {
    $num1 = (float)$_GET['num1'];
    $num2 = (float)$_GET['num2'];
    $operation = $_GET['operation'];
    $result = null;

    switch ($operation) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'sub':
            $result = $num1 - $num2;
            break;
        case 'mul':
            $result = $num1 * $num2;
            break;
        case 'div':
            if ($num2 == 0) {   
                echo "Грешка: Деление на нула не е позволено.";
                exit;
            }
            $result = $num1 / $num2;
            break;
        default:
            echo "Невалидна операция.";
            exit;
    }

    echo "<div class='container'><h3>Резултат: " . htmlspecialchars($result) . "</h3></div>";
}
?>
