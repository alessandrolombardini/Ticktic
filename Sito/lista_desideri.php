<?php
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
$templateParams["page_content"] = "./template/utente/lista_desideri_content.php";
$templateParams["eventiListaDesideri"] = $dbh->ottieniEventiDiInteresseDiUnUtente($_SESSION["id"]);
require_once("./template/base.php"); 
?>