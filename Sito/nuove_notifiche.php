<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "UTENTE"){
        $templateParams["notifiche"] = $dbh->ottieniNotificheNonVisteByIDUtente($_SESSION["id"]);    
    } else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "ORGANIZZATORE"){
        $templateParams["notifiche"] = $dbh->ottieniNotificheNonVisteByIDOrganizzatore($_SESSION["id"]);
    } else if (isset($_SESSION["id"]) && $_SESSION["autorizzazione"] == "AMMINISTRATORE"){
        $templateParams["notifiche"] = $dbh->ottieniNotificheNonVisteByIDAmministratore($_SESSION["id"]);
    }
    /**********************************************************************************/
    $templateParams["page_content"] = "./template/notifiche/nuove_notifiche_content.php";
    require_once("./template/base.php");
?>