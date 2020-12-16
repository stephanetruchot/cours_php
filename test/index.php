<?php

setcookie('testCookie', 'Alice', time() + 3600, null, null, false, true);

echo '<pre>';
print_r($_COOKIE);
echo '</pre>';
?>

