<?php
// 1ere etape : appel des variables
if(
   isset($_POST["name"]) &&
   isset($_POST["color"]) &&
   isset($_POST["origin"])&&
   isset($_POST["price"])
  )
{

    // 2eme etape : bloc des vérifs (1champ = 1 structure conditionnelle) : consiste pour chaque champ a verifier qu'il contient bien des données valides
    if(!preg_match('/^[a-zA-Z0-9À-ÖØ-öø-ÿ]{2,25}$/', $_POST["name"])){
        $errors[] = 'Le nom du fruit doit contenir entre 2 et 25 caractères';
    }

    if(!preg_match('/^[a-zA-Z0-9À-ÖØ-öø-ÿ]{2,25}$/', $_POST["color"])){
        $errors[] = 'La couleur du fruit doit contenir entre 2 et 25 caractères';
    }

    if(!preg_match('/^[a-zA-Z0-9À-ÖØ-öø-ÿ]{2,55}$/', $_POST["origin"])){
        $errors[] = 'L\'origine du fruit doit contenir entre 2 et 55 caractères';
    }

    if(!preg_match('/^[0-9]{1,4}([\.,][0-9]{1,2})?$/', $_POST["price"])) {
        $errors[] = 'Le prix du fruit doit être au format 0000.00';
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


                //Requête pour insérer les fruits, un "?" par variable
                $response = $bdd->prepare("INSERT INTO fruits(name, color, origin, price) VALUES(?, ?, ?, ?)");
                $response->execute([
                    $_POST["name"],
                    $_POST["color"],
                    $_POST["origin"],
                    str_replace(',', '.', $_POST["price"]),     // Stockage en bdd du prix avec un point au lieu d'une virgule si il y en a une
                ]);

                // si rowCount renvoi plus de 0, alors l'insertion a fonctionné, sinon erreur
                if($response->rowCount() > 0){
                // Création du message de succès en mettant la version protégée des données (sinon faille XSS)
                $successMsg = 'Le fruit ' . htmlspecialchars($_POST['name']) . ' de couleur ' . htmlspecialchars($_POST['color']) . ' d\'origine ' . htmlspecialchars($_POST['origin']) . ' au prix de ' . htmlspecialchars($_POST['price']) . '€, a bien été ajouté';

                }else{
                    $errors[] = 'problème interne au site' ;
                }
            //fermeture requête
            $response->closeCursor();
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
                            <label for="name"><p>Nom du fruit</p>
                            <input type="text" name="name">
                            </label>
                            <label for="color"><p>Couleur du fruit</p>
                            <input type="text" name="color">
                            </label>
                            <label for="origin"><p>Origine du fruit</p>
                            <input type="text" name="origin">
                            </label>
                            <label for="price"><p>Prix du fruit</p>
                            <input type="text" name="price">
                            </label>
                            <input type="submit">
                        </form>

        <?php
            }
        ?>

    </body>
</html>


