<?php

    $pageBackgroundColor = 'orange';
    $userName = 'Stéphane'

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        body
        {
            background-color : <?php echo $pageBackgroundColor; ?>;
        }
    </style>
</head>

<body>
    <?php
    echo '<h1> Exercice 2 Salutations '.$userName.' </h1>';
    ?>


</body>
</html>