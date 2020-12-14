<?php

$firstName = isset($_POST["firstname"]) ? $_POST['firstname'] : NULL;
$name = isset($_POST["name"]) ? $_POST['name'] : NULL;
$age = isset($_POST["age"]) ? $_POST['age'] : NULL;

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
        $hideErrorMessage = '<p>Votre prénom et votre nom doivent contenir entre 2 et 50 caractères, votre âge doit être compris entre 0 et 150 ans</p>';

        if
        ((strlen($firstName) > 2 && strlen($firstName) <= 50)&&
        (strlen($name) > 2 && strlen($name) <= 50)&&
        (is_numeric($age) && ($age) >= 0 && ($age) <= 150))
            {
            exit('Bonjour ' . htmlspecialchars($firstName) . ' ' . htmlspecialchars($name) . ' tu as ' . htmlspecialchars($age) . ' ans ! ');
            }

                else if
                ((!empty($firstName) && strlen($firstName) < 2 Or strlen($firstName) >= 50) Or
                (!empty($name) && strlen($name) < 2 Or strlen($name) >= 50)Or
                (!empty($age) && is_numeric($age) Or ($age) >= 150))
                    {
                            echo strip_tags($hideErrorMessage);
                    }
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
</body>
</html>