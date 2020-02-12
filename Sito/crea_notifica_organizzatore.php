<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    if(isset($_GET["IDEvento"])){
        $templateParams["IDEvento"] = $_GET["IDEvento"];
        $templateParams["page_content"] = "./template/notifiche/crea_notifica_organizzatore_content.php";    
    }
    require_once("./template/base.php");
?>