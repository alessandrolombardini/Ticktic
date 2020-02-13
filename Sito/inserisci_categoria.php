<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
if (isset($_GET["msg"]) && isset($_GET["error"])){
    $templateParams["msg"] = $_GET["msg"];
    $templateParams["error"] = $_GET["error"];
}
$templateParams["page_content"] = "./template/gestore/inserisci_categoria_content.php";
require_once("./template/base.php");
?>