<?php
    require_once("./bootstrap.php");
    $templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    $templateParams["organizzatoriDaAnalizzare"] = $dbh->ottieniOrganizzatoriNonValutati();
    $templateParams["page_content"] = "./template/amministratore/verifica_nuovi_organizzatori_content.php";;
    require_once("./template/base.php");
?>