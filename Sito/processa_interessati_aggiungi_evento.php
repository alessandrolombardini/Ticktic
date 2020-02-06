<?php
    require_once("./bootstrap.php");
    if(isset($_POST["IDEvento"]) && !empty($_POST["IDEvento"]) && $_SESSION["autorizzazione"]=="UTENTE"){
        $dbh->inserisciInteressePerUtente($_POST["IDEvento"], $_SESSION["id"]);
    } 
?>