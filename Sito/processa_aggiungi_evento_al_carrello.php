<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
$numeroBiglietti = $_POST["numeroBiglietti"];
$IDEvento = $_POST["IDEvento"];

if(checkBaseParams($IDEvento, $numeroBiglietti)){
    $risultato = $dbh->aggiungiACarrelloEvento($IDEvento, $numeroBiglietti, $_SESSION["id"]);
}

function checkBaseParams($IDEvento, $numeroBiglietti){
    return !empty($IDEvento) 
           && !empty($numeroBiglietti)
           && $numeroBiglietti > 0;
}

?>