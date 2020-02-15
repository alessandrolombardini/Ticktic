<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
    header('Location: ./page_not_allowed.php');
} if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]=="ORGANIZZATORE"){
    $info = $dbh->ottieniInformazioniOrganizzatore($_SESSION["id"]);
    if($info["ValutatoSN"] == 'n'){
        $msg = "Non sei ancora stato valutato";
        $error = "s";
        header("location: area_gestore.php?msg=".$msg."&error=".$error);
    } else if($info["ValutatoSN"] == 's' && $info["AutorizzatoSN"] == 'n'){
        $msg = "Sei stato rifiutato";
        $error = "s";
    } 
}
/**********************************************************************************/
if (isset($_GET["msg"]) && isset($_GET["error"])){
    $templateParams["msg"] = $_GET["msg"];
    $templateParams["error"] = $_GET["error"];
}
$templateParams["page_content"] = "./template/gestore/inserisci_artista_content.php";
require_once("./template/base.php");
?>