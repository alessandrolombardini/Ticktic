<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="AMMINISTRATORE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    $templateParams["categorieDaAnalizzare"] = $dbh->ottieniCategorieNonValutate();
    $templateParams["page_content"] = "./template/amministratore/verifica_nuove_categorie_content.php";
    require_once("./template/base.php");
?>