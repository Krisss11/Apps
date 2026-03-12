<?php
// reuse the shared connection helper
require_once __DIR__ . '/db.php';
?>

<!DOCTYPE html>
<html lang="bg">
    <head>
        <meta charset="UTF-8">
        <title>DB Управление</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h2>Управление на база данни</h2>

        <!-- Стъпка 1 -->
        <form method="post">
            <label>Изберете действие:</label>

            <select name="action">
            <option value="">-- избор --</option>
            <option value="search">Търсене</option>
            <option value="add">Добавяне</option>
            <option value="edit">Редактиране</option>
            <option value="delete">Изтриване</option>
            </select>

            <button type="submit">Продължи</button>
        </form>


        <?php

            if(isset($_POST['action'])){

            $action = $_POST['action'];

            /* ТЪРСЕНЕ */
            if($action == "search")
                {
                    echo '

                    <h3>Търсене</h3>
                    <form action="search.php" method="get">

                    <input type="text" name="name" placeholder="Име">

                    <button type="submit">Търси</button>

                    </form>

                    ';
                }


            /* ДОБАВЯНЕ */
            if($action == "add")
            {echo '

            <h3>Добавяне</h3>
            <form action="add.php" method="post">

            <input type="text" name="name" placeholder="Име" required>
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="phone" placeholder="Телефон">

            <button type="submit">Добави</button>

            </form>

            ';
            }


            /* РЕДАКТИРАНЕ */
            if($action == "edit"){
            echo '

            <h3>Редактиране</h3>
            <form action="edit.php" method="post">

            <input type="number" name="id" placeholder="ID на записа" required>
            <input type="text" name="name" placeholder="Ново име">
            <input type="email" name="email" placeholder="Нов email">

            <button type="submit">Запази</button>

            </form>

            ';
            }


            /* ИЗТРИВАНЕ */
            if($action == "delete"){
            echo '

            <h3>Изтриване</h3>
            <form action="delete.php" method="post">

            <input type="number" name="id" placeholder="ID на записа" required>

            <button type="submit">Изтрий</button>

            </form>

            ';
            }

            }

        ?>

    </body>
</html>
