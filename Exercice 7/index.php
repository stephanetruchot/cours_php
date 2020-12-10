<?php
    $userInfo = [
        'pseudo' => 'Kiki',
        'password' => '********',
        'ip' => '129.145.1.23',
        'lastLoginDate' => '12/10/20',
        'lastLoginHour' => '11h40',
    ]
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7</title>
    <style>
    .red
    {
        color : red;
        font-weight : bold;
    }
    </style>
</head>
<body>
    <?php

        echo 'Votre pseudo est <span class="red">' . $userInfo['pseudo'] . '</span>, votre mot de passe est <span class="red">' . $userInfo['password'] . '</span>, votre adresse IP est <span class="red">' . $userInfo['ip'] . '</span>, votre précédente connexion était le <span class="red">' . $userInfo['lastLoginDate'] . '</span> à <span class="red">' . $userInfo['lastLoginHour'] . '</span>. Bonne visite !';
    ?>
</body>
</html>