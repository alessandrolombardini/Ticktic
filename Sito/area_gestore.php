<?php 
require_once("bootstrap.php");
$templateParams["page_content"] = "./template/gestore/area_gestore_content.php";
$templateParams["nuoveNotifiche"] = //$dbh->checkNuoveNotifiche(/*$_SESSION["id]*/"1");
    true;
if (isset($_GET["msg"])){
    $templateParams["msg"] = $_GET["msg"];
}
require_once("./template/base.php");
?>