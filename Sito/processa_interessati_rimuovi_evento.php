<?php
    require_once("./bootstrap.php");
    /****************************** Check permission **********************************/
    if(!isset($_SESSION["id"])){
        header('Location: ./login.php');
    } else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
        header('Location: ./page_not_allowed.php');
    }
    /**********************************************************************************/
    if(isset($_POST["IDEvento"]) && !empty($_POST["IDEvento"])){
        $dbh->rimuoviInteressePerUtente($_POST["IDEvento"], $_SESSION["id"]);
    } 
?>