<?php
// 1ere etape : appel des variables
if(
   isset($_POST["email"])&&
   isset($_FILES["photo"])
  )
{

    // 2eme etape : bloc des vérifs (1champ = 1 structure conditionnelle) : consiste pour chaque champ a verifier qu'il contient bien des données valides
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Format d\'email invalide !';
    }

    if($_FILES['photo']['error'] == 1 || $_FILES['photo']['error'] == 2 || $_FILES['photo']['size'] > 2048000){
        $errors[] = 'taille trop grande';
    }

    //if($_FILES['photo']['error'] == 2){
    //    $errors[] = 'taille trop grande';
    //}

    if($_FILES['photo']['error'] == 3){
        $errors[] = 'partiellement dl';
    }

    if($_FILES['photo']['error'] == 4){
        $errors[] = 'pas de fichier';
    }

    if($_FILES['photo']['error'] == 6){
        $errors[] = 'server issue';
    }

    if($_FILES['photo']['error'] == 7){
        $errors[] = 'server issue';
    }

    if($_FILES['photo']['error'] == 8){
        $errors[] = 'server issue';
    }

        // 3eme étapes : si le formulaire n'a pas d'erreur, on fait les actions post-formulaire
        if($_FILES['photo']['error'] == 0){

            $format = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['photo']['tmp_name']);

            if($format != 'image/jpeg' && $format != 'image/png' && $format != 'image/gif'){

                $errors[] = 'format de fichier corrompu';

            } else {
                $name = md5(time().rand());
                $changeName = move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $name . '.jpg');
                // Création du message de succès en mettant la version protégée des données (sinon faille XSS)
                $successMsg = 'Votre image a bien été envoyé !';
            }

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
    <body>

        <?php

            // Si l'array $errors existe, alors on le parcours avec un foreach et on affiche les erreurs qu'il contient
            if(isset($errors)){
                foreach($errors as $error){
                    echo '<p style="color:red";>' . $error . '</p>';
                }
            }

            // Si la variable $successMsg existe, alors on l'affiche, sinon on affiche le formulaire dans le else
            if(isset($successMsg)){
                echo '<p style="color:green";>' . $successMsg . '</p>';
            }
        ?>
                <form action="index.php" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
                    <input type="file" name="photo" accept="image/jpeg, image/png, image/gif">
                    <input type="text" name="email">
                    <input type="submit">

                </form>


    </body>
</html>


