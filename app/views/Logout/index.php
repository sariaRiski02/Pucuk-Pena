<?php
session_destroy();
unset($_COOKIE["email"]);
unset($_COOKIE["id_user"]);
session_destroy();
header("Location: " . BASEURL . "/Home");
