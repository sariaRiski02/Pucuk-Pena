<?php
session_start();

if (isset($_COOKIE["email"]) && isset($_COOKIE["id_user"])) {
    $_SESSION["email"] = $_COOKIE["email"];
    $_SESSION["id_user"] = $_COOKIE["id_user"];
}
require_once "../app/init.php";
new App();
