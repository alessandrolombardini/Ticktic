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
$templateParams["page_content"] = "./template/gestore/inserisci_evento_content.php";
$templateParams["categorie"] = $dbh -> getCategories();
$templateParams["artisti"] = $dbh -> getArtisti();
$templateParams["azione"] = $_GET["action"];
if (isset($_GET["id"]) && !empty($_GET["id"])){
    $templateParams["evento"] = $dbh -> getEvent($_GET["id"]);
    $templateParams["artistiEvento"] = $dbh -> getArtistsFromEvent($_GET["id"]);
    $data = $templateParams["evento"]["DataEvento"];
    $templateParams["giornoEvento"] = substr($data, 8, 2);
    $templateParams["meseEvento"] = substr($data, 5, 2);
    $templateParams["annoEvento"] = substr($data, 0, 4);
    $templateParams["oraEvento"] = substr($data, 11, 5);
}

if (isset($_GET["msg"]) && isset($_GET["error"])){
    $templateParams["msg"] = $_GET["msg"];
    $templateParams["error"] = $_GET["error"];
}
require_once("./template/base.php");
?>