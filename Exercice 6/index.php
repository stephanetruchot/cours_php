<?php
    $names = ['Pierre', 'Paul', 'Jacques', 'Kiki', 'Philippe', 'Morgane', 'Marie', 'Anne', 'Murielle', 'Gertrude'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>

        <?php

            // on recupere la taille du tableau avec count()
            $arrayLenght = count($names);

            for($i = 0; $i < $arrayLenght ; $i++){
                echo '<li>'.$names[$i].'</li>';
            }


        ?>

    </ul>
</body>
</html>