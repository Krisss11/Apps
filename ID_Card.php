<div class="container">
    <h2>Данни за потребител</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Твоето име" required>
        
        <label>Пол:</label><br>
        <input type="radio" name="gender" value="m" checked style="width:auto;"> Мъж
        <input type="radio" name="gender" value="f" style="width:auto;"> Жена
        
        <select name="city">
            <option value="София">София</option>
            <option value="Пловдив">Пловдив</option>
            <option value="Варна">Варна</option>
            <option value="Бургас">Бургас</option>
            <option value="Шумен">Шумен</option>
        </select>
        
        <button type="submit" name="submit_data">Покажи</button>
    </form>
</div>

<?php 
    if(isset($_POST['submit_data'], $_POST['name'], $_POST['gender'], $_POST['city'])) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $gender = $_POST['gender'] === 'm' ? 'Мъж' : 'Жена';
        $city = htmlspecialchars($_POST['city'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        echo '<div class="result">';
        echo "Здравейте, " . ($gender === 'Мъж' ? 'г-н ' : 'г-жа ') . $name . " от " . $city . "!";
        echo '</div>';
    }
?>