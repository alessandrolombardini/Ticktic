<?php 
require_once("bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
$templateParams["page_content"] = "./template/utente/area_utente_content.php";
$templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */
$templateParams["nuoveNotifiche"] = $dbh->checkNuoveNotifiche($_SESSION["id"]);
if (isset($_GET["msg"])){
    $templateParams["msg"] = $_GET["msg"];
}
require_once("./template/base.php");
?>