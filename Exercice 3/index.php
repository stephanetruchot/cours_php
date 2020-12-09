<?php

$admin = false;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        p
        {
            color: red;
            font-weight: bold;
        }

    </style>
</head>

<body>

<?php
        if ($admin)
        {
            echo '<h1>Bonjour maitre admin</h1></br><a href="https://forums.phpfreaks.com/topic/189020-how-to-change-background-color-using-php-variable/">Clique ici</a>';
        }
        else
        {
            echo '<p>Tu hors de ma vue Esclave</p>';
        }
    ?>



</body>
</html>