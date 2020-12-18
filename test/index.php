<?php

// tentative de connexion à la base de données
try{

$bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');

} catch(Exception $e){
    // Si la connexion à échouée, le die() stop la page et affiche un message
    die('problème avec la base de données : ' . $e->getMessage());
}

$response = $bdd->query('SELECT * FROM fruits');

$fruit = $response->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($fruit);
echo '</pre>';

echo 'la couleur du fruit ' . $fruit['name'] . ' est ' . $fruit['color'];