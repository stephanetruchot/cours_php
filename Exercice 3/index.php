<?php

$admin = true;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        p
        {
            color: red;
            font-weight: bold;
        }

    </style>
</head>

<body>

<?php

        if($admin){
?>

            <h1>Bonjour Admin ! clique <a href="#">sur ce lien</a> pour gérer le site</h1>

<?php


        }else
        {
?>

            <p> ERREUR, vous n'êtes pas admin !</p>
<?php
        }
?>







</body>
</html>