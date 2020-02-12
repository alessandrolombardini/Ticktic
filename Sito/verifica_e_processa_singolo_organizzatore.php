<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
if(isset($_GET["id"]) && isset($_GET["valutazione"]) && !empty($_GET["id"]) && !empty($_GET["valutazione"])){
    $idOrganizzatoreValutato = $_GET["id"];
    $valutazione = $_GET["valutazione"];
    $dbh->aggiornaInformazioniOrganizzatore($idOrganizzatoreValutato, $valutazione);
    $notifica = $dbh->inserisciNotificaAmministratore("Sei stato accettato!", 
                                                      "Congratulazioni, sei stato accettato come organizzatore.
                                                       Goditi la tua esperienza su ticktic.", $_SESSION["id"]);   
    $dbh->pubblicaNotificaAdOrganizzatore($notifica, $idOrganizzatoreValutato); 
    header('Location: ./verifica_nuovi_organizzatori.php');
} else {
    header('Location: ./page_something_goes_wrong.php');
}
?>