<?php
// appel des variables
if(isset($_GET['search'])){

    //bloc verif
    if(!preg_match('/^[a-zA-ZÀ-ÖØ-öø-ÿ\']{1,50}$/', $_GET["search"])){
        $error = 'Votre recherche doit contenir entre 1 et 50 caractères !';
    }


    // si pas d'erreur
    if(!isset($error)){
        //connexion bdd
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');
            $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e){
            // Si la connexion à échouée, le die() stop la page et affiche un message
            die('problème avec la base de données : ' . $e->getMessage());
        }

            // On prepare la requête pour rechercher si la recherche users existe dans la bdd
            $searchFruits = $bdd->prepare(
                // selection de la table et de la colonne avec la valeur a rechercher
                "SELECT * FROM fruits WHERE name LIKE ?"
            );
            // On envoie les % dans le execute concaténés à la recherche et non pas dans la requête SQL directement sinon ca marche pas
            $searchFruits->execute([
                '%' . $_GET["search"] . '%'
            ]);

            $fruits = $searchFruits->fetchAll(PDO::FETCH_ASSOC);

            if(empty($fruits)){
                echo 'Aucun résultat pour cette recherche';
            }


    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recherche</title>
    <style>

        table tr td, table tr th{
            border: 1px solid black;
            margin : 20px;
            padding : 10px;
        }
        table{
            border-collapse: separate;
        }

    </style>
</head>
<body>

<?php
            // Si l'array $errors existe
            if(isset($error)){
                    echo '<p style="color:red";>' . $error . '</p>';
            }

?>
    <form action="index.php" method="GET">
    <label for="search"><p>Votre recherche</p>
    <input type="text" name="search">
    </label>
    <input type="submit">
    </form>

<?php

            if(!empty($fruits)){

                echo '<p>Il y a ' . count($fruits) . ' résultat(s) à votre recherche.</p>'

?>
                <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Couleur</th>
                        <th>Origine</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($fruits as $fruit){
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars(ucfirst($fruit['name'])) . '</td>';
                    echo '<td>' . htmlspecialchars($fruit['color']) . '</td>';
                    echo '<td>' . htmlspecialchars(ucfirst($fruit['origin'])) . '</td>';
                    echo '<td>' . htmlspecialchars($fruit['price']) . '€</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
                </table>
<?php
            }

?>
</body>
</html>