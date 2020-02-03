<?php 
require_once("./bootstrap.php");

$titolo = $_POST["titolo"];
$testo = $_POST["testo"];
$IDEvento = $_POST["IDEvento"];
$inserimentoCorretto = false;

if(checkBaseParams($titolo, $testo, $IDEvento)){
    $inserimentoCorretto = true;
    $IDOrganizzatore = $_SESSIONE["id"];
    $IDNotifica = $dbh->inserisciNotificaOrganizzatore($titolo, $testo, $IDOrganizzatore, $IDEvento);
    $dbh->pubblicaNotificaATuttiGliUtentiDiUnEvento($IDNotifica, $IDEvento);
    $dbh->inserisciNotificaInNoteDiUnEvento($titolo, $testo, $IDEvento);
}

if($inserimentoCorretto == true){
    //require_once("./area_amministratore.php");
} else { 
    //require_once("./crea_notifica_amministratore.php");
}

function checkBaseParams($titolo, $testo, $destinazione){
    return !empty($titolo) 
           && !empty($testo)
           && !empty($IDEvento);
}

?>