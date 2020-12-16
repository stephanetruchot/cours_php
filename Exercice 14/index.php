
<?php

// couleur assigné par défaut
$newColor = 'grey';

// Si le cookie de sauvegarge de la couleur existe, $newColor prendre la couleur stockée dedans
if(isset($_COOKIE['backgroundColor']))
{
    $newColor = $_COOKIE['backgroundColor'];
}

// appel des variables
if  (isset($_POST['color']))
{

    //bloc verif
    if(mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 10){
        $error = 'Nom de couleur erronée';
    }

    // si pas d'erreur
    if(!isset($error)){

        // $newColor contiendra la couleur du formulaire
        $newColor = $_POST['color'];

        // on crée un nouveau cookie avec la nouvelle couleur
        setcookie('backgroundColor', $_POST['color'], time() + 24 * 3600, null, null, false ,true);


    }
}



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style ="background-color:<?php echo htmlspecialchars($newColor);?>;">


            <form action="index.php" method="POST">
                <input type="color" name="color">
                <input type="submit">
            </form>
        <?php
        //si le pmsg d'erreur existe on l'affiche
            if(isset($error)){
                {
                    echo '<p style="color:red";>' . $error . '</p>';
                }
            }
        ?>

</body>
</html>