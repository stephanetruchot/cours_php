<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compteur</title>
</head>
<body>
<?php
    // connexion au fichier
    $myFile = fopen('compteur.txt', 'r+');

    // récupération du nombre actuel de visite
    $visits = fread($myFile, 12);

    // augmentation du nombre de visites de 1
    $visits++;

    // replacement du curseur PHP au debut du fichier (pour écrire par dessus l'ancien number)
    fseek($myFile, 0);

    //ecriture du nouveau nombre dans le fichier à la place de l'ancien
    fwrite($myFile, $visits);

    // fermeture de la connexion
    fclose($myFile);

?>

    <h1>Cette page a été vue <?php  echo $visits; ?> fois.</h1>
</body>
</html>