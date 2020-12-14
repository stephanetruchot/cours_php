<?php

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
    if(isset($_GET["name"]) && isset($_GET["mail"])){

    echo 'Bonjour ' . htmlspecialchars($_GET["name"]) . ' ton adresse email est ' . htmlspecialchars($_GET["mail"]) . '!';

    }
    else
    {
    echo 'Vous devez d\'abord remplir votre formulaire';
    }

?>
</body>
</html>