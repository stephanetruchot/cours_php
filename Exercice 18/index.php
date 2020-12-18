<?php

// tentative de connexion à la base de données
try{
$bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');
$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
    // Si la connexion à échouée, le die() stop la page et affiche un message
    die('problème avec la base de données : ' . $e->getMessage());
}
// Si $_GET['color'] existe dans l'url, alors on cherchera tous les fruits de cette couleur, sinon on récupère tous les fruits (dans le else)
if(isset($_GET['color'])){

    //Requête pour récupérer tous les fruits dont la couleur est celle présente dans l'URL (requête préparée car on a une variable PHP dansla requête)
    $response = $bdd->prepare("SELECT * FROM fruits WHERE color = ?");
    $response->execute([
        $_GET['color']
    ]);

} else {
    // requête pour récupérer tous les fruits (requête directe (query) car on a pas de variable PHP dans la requête)
    $response = $bdd->query('SELECT * FROM fruits');
}

// récupération des fruits sous forme d'arrays associatifs
$fruits = $response->fetchALL(PDO::FETCH_ASSOC);

// fermeture requête
$response->closeCursor();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="index.php" method="GET">
    <input type="text" name="color">
    <input type="submit">
    </form>

<?php
    if(!empty($fruits)){

        echo '<ul>';

        foreach($fruits as $fruit){
            echo '<li>la couleur du fruit ' . $fruit['name'] . ' est ' . $fruit['color'] . '</li>';
        }
        echo '</ul>';

    } else {
        echo '<p> Aucun fruit à afficher !</p>';
    }


?>
</body>
</html>


