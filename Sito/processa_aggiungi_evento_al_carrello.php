<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
$numeroBiglietti = $_GET["numeroBiglietti"];
$IDEvento = $_GET["IDEvento"];

if(checkParams($IDEvento, $numeroBiglietti)){
    $risultato = $dbh->aggiungiACarrelloEvento($IDEvento, $numeroBiglietti, $_SESSION["id"]);
}

function checkParams($IDEvento, $numeroBiglietti){
    return !empty($IDEvento) 
           && !empty($numeroBiglietti)
           && $numeroBiglietti > 0;
}

?>