<?php 
require_once("./bootstrap.php");

$numeroBiglietti = $_POST["numeroBiglietti"];
$IDEvento = $_POST["IDEvento"];
$inserimentoCorretto = false;

if(checkBaseParams($IDEvento, $numeroBiglietti)){
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

function checkBaseParams($IDEvento, $numeroBiglietti){
    return !empty($IDEvento) 
           && !empty($numeroBiglietti)
           && $numeroBiglietti > 0;
}

?>