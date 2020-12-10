<?php

    $users =
    [
        [
            'name' => 'Jean',
            'gender' => 'homme',
            'birthdate' => '13/09/20'
        ],
        [
            'name' => 'Hypolithe',
            'gender' => 'non binaire',
            'birthdate' => '01/05/00'
        ],
        [
            'name' => 'Marie',
            'gender' => 'femme',
            'birthdate' => '03/08/96'
        ],
        [
            'name' => 'Gertrude',
            'gender' => 'femme',
            'birthdate' => '19/09/68'
        ],
        [
            'name' => 'Natacha',
            'gender' => 'femme',
            'birthdate' => '25/11/06'
        ],
    ];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        foreach($users as $x)
        {

            echo '<h2> Bienvenue ' . $x['name'] . ' ! </h2>';
            echo '<p> Tu es un(e) ' . $x['gender'] . ' et tu es né(e) le ' . $x['birthdate'] . ' </p>';

        }
    ?>

</body>
</html>