<?php

echo '<pre>';
print_r($_POST);
echo '</pre>'

echo '<pre>';
print_r($_FILES);
echo '</pre>'

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <input type="file" name="photo" accept="image/jpeg, image/png">
        <input type="text" name="email">
        <input type="submit">

    </form>
</body>
</html>