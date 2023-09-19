<?php






session_destroy();
unset($_SESSION["email"]);
unset($_SESSION["id_user"]);
unset($_COOKIE["email"]);
unset($_COOKIE["id_user"]);
setcookie("email", "", time() - 3600, "/");
setcookie("id_user", "", time() - 3600, "/");

header("Location:" . BASEURL . "/Home");
exit;
