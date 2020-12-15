<?php
// 1ere etape : appel des variables
if  (
    isset($_POST["firstname"]) &&
    isset($_POST["name"]) &&
    isset($_POST["age"])
    )
{
    // 2eme etape : bloc des vérifs (1champ = 1 structure conditionnelle) : consiste pour chaque champ a verifier qu'il contient bien des données valides

    if(mb_strlen($_POST["firstname"]) < 2 || mb_strlen($_POST["firstname"]) > 50){
        $errors[] = 'Prénom pas bon !';
    }

    if(mb_strlen($_POST["name"]) < 2 || mb_strlen($_POST["name"]) > 50){
        $errors[] = 'Nom pas bon !';
    }

    if(!is_numeric($_POST['age']) || $_POST['age'] < 0 || $_POST['age'] > 150 || !ctype_digit($_POST['age'])) {
        $errors[] = 'age pas bon !';
    }


    // 3eme étapes : si le formulaire n'a pas d'erreur, on fait les actions post-formulaire
    if(!isset($errors)){

        // Création du message de succès en mettant la version protégée des données (sinon faille XSS)
        $successMsg = 'Bonjour' . htmlspecialchars($_POST['firstname']) . ' ' . htmlspecialchars($_POST['name']) . ' , tu as ' . htmlspecialchars($_POST['age']) . ' ans !';
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
                            <label for="firstname"><p>Prénom</p>
                            <input type="text" name="firstname">
                            </label>
                            <label for="name"><p>Nom</p>
                            <input type="text" name="name">
                            </label>
                            <label for="age"><p>Age</p>
                            <input type="text" name="age">
                            </label>
                            <input type="submit">
                        </form>

<?php
            }
?>




</body>
</html>