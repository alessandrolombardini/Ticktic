<?php

    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else {
        if ($_SESSION["autorizzazione"] == "ORGANIZZATORE"){
            $templateParams["account"] = $dbh->ottieniInformazioniOrganizzatore($_SESSION["id"]);
        } else if ($_SESSION["autorizzazione"] == "UTENTE") {
            $templateParams["account"] = $dbh->getUtente($_SESSION["id"]);
        } else if ($_SESSION["autorizzazione"] == "AMMINISTRATORE") {
            $templateParams["account"] = $dbh->ottieniInformazioniAmministratore($_SESSION["id"]);
        }
    }

?>