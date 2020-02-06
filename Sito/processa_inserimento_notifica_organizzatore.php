<?php 
require_once("./bootstrap.php");
 /****************************** Check permission **********************************/
 if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
$inserimentoCorretto = false;
if(isset($_POST["titolo"]) && isset($_POST["testo"]) && isset($_POST["IDEvento"])){
    $titolo = $_POST["titolo"];
    $testo = $_POST["testo"];
    $IDEvento = $_POST["IDEvento"];
    if(checkBaseParams($titolo, $testo, $IDEvento)){
        $inserimentoCorretto = true;
        $IDOrganizzatore = $_SESSION["id"];
        $IDNotifica = $dbh->inserisciNotificaOrganizzatore($titolo, $testo, $IDOrganizzatore, $IDEvento);
        $dbh->pubblicaNotificaATuttiGliUtentiDiUnEvento($IDNotifica, $IDEvento);
    } else {
        $templateParams["loginErrorMessage"]="Compila correttamente i campi!";
    }
} else {
    $templateParams["loginErrorMessage"]="Compila correttamente i campi!";
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