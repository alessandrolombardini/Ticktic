<?php 
require_once("./bootstrap.php");

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