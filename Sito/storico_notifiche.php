<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } 
    /**********************************************************************************/
    $templateParams["page_content"] = "./template/notifiche/storico_notifiche_content.php";
    $templateParams["notifiche"] = $dbh->ottieniNotificheVisteByIDPersona($_SESSION["id"]);
    require_once("./template/base.php");
?>