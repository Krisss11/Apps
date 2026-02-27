<div class="container">
    <h2>Проверка на възраст</h2>
    <form method="GET" autocomplete="off">
        <input type="number" name="age" placeholder="Въведи години" required>
        <button type="submit" name="check_age">Провери</button>
    </form>
</div>
<?php
if(isset($_GET['age'])){
    $age = (int)$_GET['age'];
    if($age<18) echo "Вие сте непълнолетен.";
    elseif($age>=18 && $age<65) echo "Вие сте възрастен.";
    else echo "Вие сте пенсионер.";
}
?>

