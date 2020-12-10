<?php

    // Création d'un array contenant des users avec leurs infos (multidimensionnel) ici 3 arrays
    $users =
    [
        [
            'name' => 'Jean',
            'gender' => 'homme',
            'birthdate' => '13/09/20',
            'countries' => ['france', 'italie'],
        ],
        [
            'name' => 'Hypolithe',
            'gender' => 'non binaire',
            'birthdate' => '01/05/00',
            'countries' => ['japon'],
        ],
        [
            'name' => 'Marie',
            'gender' => 'femme',
            'birthdate' => '03/08/96',
            'countries' => [],              // Pas de pays visité donc array vide
        ],
        [
            'name' => 'Gertrude',
            'gender' => 'femme',
            'birthdate' => '19/09/68',
            'countries' => ['france', 'espagne'],
        ],
        [
            'name' => 'Natacha',
            'gender' => 'femme',
            'birthdate' => '25/11/06',
            'countries' => ['zimbabwe', 'espagne', 'russie'],
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

        //On parcours tous les users avec un foreach pour afficher une structure HTML pour chacun d'entre eux
        foreach($users as $usersInfo)
        {

            // titre h2 avec nom de l'users
            echo '<h2> Bienvenue ' . $usersInfo['name'] . ' ! </h2>';
            // idem avec les autres infos dans un p
            echo '<p> Tu es un(e) ' . $usersInfo['gender'] . ' et tu es né(e) le ' . $usersInfo['birthdate'] . ' </p>';
            echo '<p> Liste des pays visité :</p>';

            // si l'user a visité au moins un pays (tableau de taille 1 ou +), alors on affichera ces pays, sinon on ira dans le else pour afficher le message d'erreur
            if( count($usersInfo['countries']) > 0){

                //ouverture de la liste a puce
                echo '<ul>';

                // on parcours les pays pour les afficher un par un dans un li
                foreach($usersInfo['countries'] as $country)
                {
                    echo '<li>' . $country . '</li>';
                };

                // fermeture de la liste a puce
                echo '</ul>';
            }

            // message d'erreur si l'users n'a visité aucun pays
            else{
                echo '<p style="color:red;"> Cet utilisateur n\'a pas encore visité de pays </p>';
            }
        }
    ?>

</body>
</html>