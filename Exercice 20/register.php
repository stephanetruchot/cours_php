<?php
// 1ere etape : appel des variables
if(
   isset($_POST["email"]) &&
   isset($_POST["password"]) &&
   isset($_POST["confirmPassword"])
  )
{

    // 2eme etape : bloc des vérifs (1champ = 1 structure conditionnelle) : consiste pour chaque champ a verifier qu'il contient bien des données valides

    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Format d\'email invalide !';
    }

    if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,4096}$/', $_POST["password"])){
        $errors[] = ' Votre mot de passe doit contenir entre 8 et 4096 caractères y compris une minuscule une majuscule un nombre et un caractère spécial @$!%*?& !';
    }

    if($_POST["password"] != $_POST["confirmPassword"]){
        $errors[] = ' Votre mot de passe ne correspond pas';
    }

        // 3eme étapes : si le formulaire n'a pas d'erreur, on fait les actions post-formulaire
        if(!isset($errors)){
            // connexion base de données
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');
                $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(Exception $e){
                // Si la connexion à échouée, le die() stop la page et affiche un message
                die('problème avec la base de données : ' . $e->getMessage());
            }

            // On prepare la requête pour rechercher si l'adresse mail existe dans la bdd
            $checkEmail = $bdd->prepare(
                // selection de la table et de la colonne avec la valeur a rechercher
                'SELECT count(`id`) FROM `accounts` WHERE `email` = :la_valeur'
            );
            // comparaison des valeurs des emails existant avec l'email rentré par l'utilisateur
            $checkEmail->execute(array('la_valeur' => '' . $_POST["email"] . ''));

                    //Si la variable $checkEmail est déja présente dans la bdd elle sera supérieur a 0 donc un message d'erreur
                    if ($checkEmail->fetchColumn() > 0) {
                        $errors[] = 'Votre adresse email est déja enregistré dans la bdd';
                    }
                    // Sinon pas de correspondance, on va pouvoir faire INSERT
                    else {
                        //Requête pour insérer les infos, un "?" par variable
                        $response = $bdd->prepare("INSERT INTO accounts(email, password, register_date) VALUES(?, ?, ?)");
                        $response->execute([
                            $_POST["email"],
                            password_hash('' . $_POST["password"] . '', PASSWORD_BCRYPT),
                            $date = date('Y-m-d H:i:s')
                        ]);

                            // si rowCount renvoi plus de 0, alors l'insertion a fonctionné, sinon erreur
                            if($response->rowCount() > 0){
                            // Création du message de succès en mettant la version protégée des données (sinon faille XSS)
                            $successMsg = 'Bonjour ' . htmlspecialchars($_POST['email']) . ', votre compte a bien été créé.';
                            }
                            else{
                                $errors[] = 'problème interne au site' ;
                            }
                    //fermeture requête
                    $response->closeCursor();

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
            } else {
        ?>
                        <form action="register.php" method="POST">
                            <label for="email"><p>Votre email</p>
                            <input type="text" name="email">
                            </label>
                            <label for="password"><p>Mot de passe</p>
                            <input type="password" name="password">
                            </label>
                            <label for="confirmPassword"><p>Confirmer votre mot de passe</p>
                            <input type="password" name="confirmPassword">
                            </label>
                            <input type="submit">
                        </form>

        <?php
            }
        ?>

    </body>
</html>


