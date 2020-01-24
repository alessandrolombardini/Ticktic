<?php 
require_once("./bootstrap.php");

if (isset($_POST["email"]) && isset($_POST["password"])){
    $templateParams["utente"] = $dbh -> checkLogin($_POST["email"], $_POST["password"]);
    var_dump($templateParams["utente"]);
}

require_once("./template/base.php");
?>