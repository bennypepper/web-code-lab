<?php

setcookie("user", "", time() - 3600, "/");

echo "Cookie user has been deleted. Coba akses <a href='cookie-get.php'>cookie-get.php</a> lagi untuk membuktikan.";
?>