<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
<?php
    for($i = 0; $i <5000; $i++){
        echo '<li>'.($i+1).'</li>';
    }
?>
    </ul>
</body>
</html>