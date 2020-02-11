<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    $nome = $_POST["nome"];
    $id = $dbh->insertCategoriaNonValutata($nome);
    $msg = $id!=false ? $msg = "Richiesta inoltrata." : $msg = "Errore in inserimento!";
    header("location: area_gestore.php?msg=".$msg);
?>