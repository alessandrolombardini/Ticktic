<?php 
require_once("bootstrap.php");
$templateParams["page_content"] = "./template/utente/area_utente_content.php";
$templateParams["nuoveNotifiche"] = $dbh->checkNuoveNotifiche(/*$_SESSION["id"]*/"1");
if (isset($_GET["msg"])){
    $templateParams["msg"] = $_GET["msg"];
}
require_once("./template/base.php");
?>