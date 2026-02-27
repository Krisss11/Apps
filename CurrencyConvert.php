<div class="container">
    <h2>Валутен конвертор</h2>
    <form method="POST">
        <input type="number" name="amount" placeholder="Сума в ЛЕВА" required step="0.01">
        <select name="currency">
            <option value="1.95583">Евро (EUR)</option>
            <option value="1.80">Щатски долар (USD)</option>
            <option value="2.30">Британски паунд (GBP)</option>
        </select>
        <button type="submit" name="convert">Конвертирай</button>
    </form>
</div>

<?php
if(isset($_POST['amount'], $_POST['currency'])) {
    $amount = floatval($_POST['amount']);
    $curreny = floatval($_POST['currency']);
    $converted = $amount / $curreny;
    echo '<div class="result">Резултат: ' . number_format($converted, 2) . '</div>';
}
?>

