<?php
    // Appel des variables
    if(
        isset($_POST["email"]) &&
        isset($_POST["age"]) &&
        isset($_POST["url"])
    ){
        // Bloc vérifications

        // doit etre un email invalide "!"
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $errors[] = 'email pas bon !';
        }

        // doit etre soit pas un chiffre "!" soit plus petit que 0 soit au dessus de 150
        if(!filter_var($_POST['age'], FILTER_VALIDATE_INT) || $_POST['age'] < 0 || $_POST['age'] > 150){

            $errors[] = 'age pas bon !';

        }

        // doit etre un url invalide "!"
        if(!filter_var($_POST["url"], FILTER_VALIDATE_URL)){
            $errors[] = 'url pas bon !';
        }

        // Actions post formulaire si celui_ci n'a pas d'erreur
        if(!isset($errors)){

            // message de succès à afficher plus bas dans la page
            $successMsg = 'Vos données ont bien été récoltées, merci pour ça !';

        }

    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 16</title>
</head>
<body>

<?php

            // Si il y a des erreurs
            if(isset($errors)){
                foreach($errors as $error){
                    echo '<p style="color:red";>' . $error . '</p>';
                }
            }

            // Si tout fonctionne
            if(isset($successMsg)){
                echo '<p style="color:green";>' . $successMsg . '</p>';
            }

            else {

?>

            <form action="index.php" method="POST">
                <label for="email"><p>Adresse email</p>
                <input type="text" name="email">
                </label>
                <label for="age"><p>Age</p>
                <input type="text" name="age">
                </label>
                <label for="url"><p>Site préféré</p>
                <input type="text" name="url">
                </label>
                <input type="submit">
            </form>

<?php
            }
?>


</body>
</html>