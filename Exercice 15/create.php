<?php
    session_start();
    


    if(
        isset($_SESSION['firstname'])&&
        isset($_SESSION['name'])
    )
    {
        $error = 'Les variables sont déja créées!';
    }
    else{
        $_SESSION['firstname']= 'Marie';
        $_SESSION['name']= 'Petite';

        $success ='les variables de session ont bien été créées';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>CREATE</h1>
    <?php
        include 'menu.php';
        if(isset($success))
        {
            echo $success;
        }
        if(isset($error)){
            echo $error;
        }
    ?>
</body>
</html>

