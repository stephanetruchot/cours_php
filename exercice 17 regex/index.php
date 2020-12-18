<?php
// 1ere etape : appel des variables
if  (
    isset($_POST["pseudonyme"]) &&
    isset($_POST["password"]) &&
    isset($_POST["email"]) &&
    isset($_POST["age"])
    )
{
    // 2eme etape : bloc des vérifs (1champ = 1 structure conditionnelle) : consiste pour chaque champ a verifier qu'il contient bien des données valides

    if(!preg_match('/^[a-zA-Z0-9À-ÖØ-öø-ÿ\']{2,25}$/', $_POST["pseudonyme"])){
        $errors[] = 'Votre Pseudo doit contenir entre 2 et 25 caractères, accent apostrophe et nombre autorisé !';
    }

    if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,4096}$/', $_POST["password"])){
        $errors[] = ' Votre mot de passe doit contenir entre 8 et 4096 caractères y compris une minuscule une majuscule un nombre et un caractère spécial @$!%*?& !';
    }

    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Format d\'email invalide !';
    }

    if(!preg_match('/(^(((0[1-9]|1[0-9]|2[0-8])[-\/](0[1-9]|1[012]))|((29|30|31)[-\/](0[13578]|1[02]))|((29|30)[-\/](0[4,6,9]|11)))[-\/](19|[2-9][0-9])\d\d$)|(^29[-\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/', $_POST["age"])) {
        $errors[] = 'Votre date de naissance doit être au format jj/mm/aaaa ou bien jj-mm-aaaa !';
    }


    // 3eme étapes : si le formulaire n'a pas d'erreur, on fait les actions post-formulaire
    if(!isset($errors)){

        // Création du message de succès en mettant la version protégée des données (sinon faille XSS)
        $successMsg = 'Votre compte a bien été créé !';
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
            } else {
?>
                        <form action="index.php" method="POST">
                            <label for="pseudonyme"><p>Pseudo</p>
                            <input type="text" name="pseudonyme">
                            </label>
                            <label for="password"><p>password</p>
                            <input type="password" name="password">
                            </label>
                            <label for="email"><p>Email</p>
                            <input type ="text" name="email">
                            </label>
                            <label for="age"><p>Date de naissance</p>
                            <input type="text" name="age">
                            </label>
                            <input type="submit">
                        </form>

<?php
            }
?>




</body>
</html>