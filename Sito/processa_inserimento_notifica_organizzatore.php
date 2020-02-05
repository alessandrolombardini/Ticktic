<?php 
require_once("./bootstrap.php");

$titolo = $_POST["titolo"];
$testo = $_POST["testo"];
$IDEvento = $_POST["IDEvento"];
$inserimentoCorretto = false;

if(checkBaseParams($titolo, $testo, $IDEvento)){
    $inserimentoCorretto = true;
    $IDOrganizzatore = $_SESSION["id"];
    $IDNotifica = $dbh->inserisciNotificaOrganizzatore($titolo, $testo, $IDOrganizzatore, $IDEvento);
    $dbh->pubblicaNotificaATuttiGliUtentiDiUnEvento($IDNotifica, $IDEvento);
    /*$dbh->inserisciNotificaInNoteDiUnEvento($titolo, $testo, $IDEvento);*/
}

if($inserimentoCorretto == true){
    require_once("./area_gestore.php");
} else { 
    require_once("./crea_notifica_organizzatore.php");
}

function checkBaseParams($titolo, $testo, $IDEvento){
    return !empty($titolo) 
           && !empty($testo)
           && !empty($IDEvento);
}

?>