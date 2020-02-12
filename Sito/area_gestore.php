<?php
require_once("bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
$templateParams["page_content"] = "./template/gestore/area_gestore_content.php";
$templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */
$templateParams["nuoveNotifiche"] = $dbh-> checkNuoveNotificheOrganizzatore(/*$_SESSION["id]*/"1");
if (isset($_GET["msg"]) && isset($_GET["error"])){
    $templateParams["msg"] = $_GET["msg"];
    $templateParams["error"] = $_GET["error"];
}
require_once("./template/base.php");
?>
