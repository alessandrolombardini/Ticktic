<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    $templateParams["page_content"] = "./template/notifiche/crea_notifica_amministratore_content.php";
    require_once("./template/base.php");
?>