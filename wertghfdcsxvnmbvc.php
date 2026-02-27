<div class="container">
    <h2>Списък за пазаруване</h2>

    <?php
    // Това симулира база данни
    $products = [
        "Хляб" => 1.80,
        "Мляко" => 2.50,
        "Яйца (10 бр.)" => 3.20,
        "Сирене" => 8.50,
        "Шоколад" => 4.00
    ];
    ?>

    <form method="POST">
        <p>Избери продукти:</p>

        <?php foreach ($products as $name => $price): ?>
            <label style="display:block; margin: 5px 0;">
                <input type="checkbox" name="cart[]" 
                       value="<?php echo htmlspecialchars($name); ?>">
                <?php echo htmlspecialchars($name); ?> - 
                <?php echo number_format($price, 2); ?> лв.
            </label>
        <?php endforeach; ?>

        <br>
        <button type="submit" name="buy">Калкулирай сметка</button>
    </form>

    <?php
    // Обработка на формата
    if (isset($_POST['buy']) && !empty($_POST['cart'])) {
        $total = 0;

        echo "<h3>Избрани продукти:</h3>";
        echo "<ul>";

        foreach ($_POST['cart'] as $selected) {
            if (isset($products[$selected])) {
                echo "<li>" . htmlspecialchars($selected) . 
                     " - " . number_format($products[$selected], 2) . " лв.</li>";
                $total += $products[$selected];
            }
        }

        echo "</ul>";
        echo "<strong>Обща сума: " . number_format($total, 2) . " лв.</strong>";
    }
    ?>
</div>