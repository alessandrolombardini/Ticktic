<?php
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
if(isset($_GET["id"]) && !empty($_GET["id"])){
    $IDArtista = $_GET["id"];
    $templateParams["informazioni_artista"] = $dbh->ottieniInformazioniArtista($IDArtista);
    $templateParams["page_content"] = "./template/amministratore/verifica_singolo_artista_content.php";
} else {
    header('Location: ./page_something_goes_wrong.php');
}
require_once("./template/base.php");
?>