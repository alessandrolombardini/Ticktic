<?php 
    require_once("./bootstrap.php");
    if(isset($_GET["id"]) && isset($_GET["valutazione"]) && $_SESSION["autorizzazione"]=="AMMINISTRATORE"){
        $idOrganizzatoreValutato = $_GET["id"];
        $valutazione = $_GET["valutazione"];
        $dbh->aggiornaInformazioniOrganizzatore($idOrganizzatoreValutato, $valutazione);
        $notifica = $dbh->inserisciNotificaAmministratore("Sei stato accettato!", 
                                                          "Congratulazioni, sei stato accettato come organizzatore.
                                                           Goditi la tua esperienza su ticktic.", 
                                                           $_SESSION["id"]);   
        $dbh->pubblicaNotificaAdOrganizzatore($notifica, $idOrganizzatoreValutato); 
        require_once("./verifica_nuovi_organizzatori.php");
    } else {
        require_once("./page_not_found.php");
    }
    require_once("./template/base.php");
?>