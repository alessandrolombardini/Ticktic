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
$templateParams["nuoveNotifiche"] = $dbh-> checkNuoveNotificheOrganizzatore(/*$_SESSION["id]*/"1");
if (isset($_GET["msg"])){
    $templateParams["msg"] = $_GET["msg"];
}
require_once("./template/base.php");
?>
