<?php
    require_once("./bootstrap.php");
    if(isset($_POST["IDEvento"]) && !empty($_POST["IDEvento"]) && $_SESSION["autorizzazione"]=="UTENTE"){
        $dbh->rimuoviInteressePerUtente($_POST["IDEvento"], $_SESSION["id"]);
    } 
?>