<?php 
require_once("./bootstrap.php");

$titolo = $_POST["titolo"];
$testo = $_POST["testo"];
$destinazione = $_POST["destinazione"];
$inserimentoCorretto = false;

if(checkBaseParams($titolo, $testo, $destinazione)){
    $IDNotifica = $dbh->inserisciNotificaAmministratore($titolo, $testo, $_SESSION["id"]);
    $inserimentoCorretto = true;
    if($destinazione=="utenti"){
        $dbh->pubblicaNotificaATuttiGliUtenti($IDNotifica);
    }else if($destinazione=="organizzatori"){
        $dbh->pubblicaNotificaATuttiGliOrganizzatori($IDNotifica);
    }else if($destinazione=="tutti"){
        $dbh->pubblicaNotificaATuttiGliUtenti($IDNotifica);
        $dbh->pubblicaNotificaATuttiGliOrganizzatori($IDNotifica);
    }
}

if($inserimentoCorretto == true){
    require_once("./area_amministratore.php");
} else { 
    require_once("./crea_notifica_amministratore.php");
}

function checkBaseParams($titolo, $testo, $destinazione){
    return !empty($titolo) 
           && !empty($testo)
           && ($destinazione == "utenti" || $destinazione == "organizzatori" || $destinazione == "tutti");
}

?>