<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compteur2</title>
</head>
<body>
<?php


    $visits = file_get_contents('compteur.txt');
    file_put_contents('compteur.txt' , $visits++);



?>

    <h1>Cette page a été vue <?php  echo $visits; ?> fois.</h1>
</body>
</html>