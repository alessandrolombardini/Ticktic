<?php
    require_once("./bootstrap.php");
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"){
        $templateParams["notifiche"] = $dbh->ottieniNotificheVisteByIDUtente($_SESSION["id"]);    
    } else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "ORGANIZZATORE"){
        $templateParams["notifiche"] = $dbh->ottieniNotificheVisteByIDOrganizzatore($_SESSION["id"]);
    } else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "AMMINISTRATORE"){
        $templateParams["notifiche"] = $dbh->ottieniNotificheVisteByIDAmministratore($_SESSION["id"]);
    }
    /**********************************************************************************/
    $templateParams["page_content"] = "./template/notifiche/storico_notifiche_content.php";
    require_once("./template/base.php");
?>