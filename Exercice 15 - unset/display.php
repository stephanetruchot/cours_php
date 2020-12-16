<?php
session_start();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <h1>DISPLAY</h1>
    <?php
        include 'menu.php';

        if(
            isset($_SESSION['firstname'])&&
            isset($_SESSION['name'])
        )
        {
            echo 'Bonjour ' . htmlspecialchars($_SESSION['firstname']) . ' ' . htmlspecialchars($_SESSION['name']). '.';
        }
        else{
            echo 'Allez sur la page create';
        }

    ?>
</body>
</html>