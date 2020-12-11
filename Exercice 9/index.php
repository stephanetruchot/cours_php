<?php

    // Création de la fonction
    function print_rv2($elementToDiplay){
        echo '<pre>';
        print_r ($elementToDiplay);
        echo '</pre>';
    }

    // Création d'un tableau
    $fruits = ['banane', 'fraise', 'pomme', 'poire'];

    // fonction TVA d'abord le prix hors taxe, puis la taxe (mettre un taux fixe de base)
    function getTTCPrice($htPrice, $tax = 20){

        // calcul du prix TTC en multipliant le prix hors taxe par la taxe +1
        return $htPrice * (($tax / 100) + 1);
    }

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

    // Appel la fonction print_rv2() afin d'afficher le tableau $fruits
    print_rv2($fruits);

    // Appel la fonction TVA
    echo getTTCPrice(100, 60);

    ?>

</body>
</html>
