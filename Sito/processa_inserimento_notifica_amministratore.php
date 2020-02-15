<?php
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
$inserimentoCorretto = false;
if(isset($_POST["titolo"]) && isset($_POST["testo"]) && isset($_POST["destinazione"])){
    $titolo = $_POST["titolo"];
    $testo = $_POST["testo"];
    $destinazione = $_POST["destinazione"];
    if(checkParams($titolo, $testo, $destinazione)){
        $inserimentoCorretto = true;
        $IDNotifica = $dbh->inserisciNotificaAmministratore($titolo, $testo, $_SESSION["id"]);
        if($destinazione=="utenti"){
            $dbh->pubblicaNotificaATuttiGliUtenti($IDNotifica);
        }else if($destinazione=="organizzatori"){
            $dbh->pubblicaNotificaATuttiGliOrganizzatori($IDNotifica);
        }else if($destinazione=="tutti"){
            $dbh->pubblicaNotificaATuttiGliUtenti($IDNotifica);
            $dbh->pubblicaNotificaATuttiGliOrganizzatori($IDNotifica);
        }
    } else {
        $templateParams["msg"]="Compila correttamente i campi!";
    }
} else {
    $templateParams["msg"]="Compila correttamente i campi!";
}

if($inserimentoCorretto == true){
    $templateParams["msg"] = "Notifica inserita correttamente";
    $templateParams["error"] = 'n';
} else {
      $templateParams["msg"] = "Errore: notifica non inserita.";
      $templateParams["error"] = 's';
}
require_once("./crea_notifica_amministratore.php");
function checkParams($titolo, $testo, $destinazione){
    return !empty($titolo)
           && !empty($testo)
           && ($destinazione == "utenti" || $destinazione == "organizzatori" || $destinazione == "tutti");
}

?>
