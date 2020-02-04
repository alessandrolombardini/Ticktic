<?php
    require_once("bootstrap.php");
    $templateParams["page_content"] = "./template/carrello_content.php";
    $templateParams["eventi"] = $dbh -> getEventiCheDesideraAcquistare(/*$_SESSION["id"]*/"1");
    $templateParams["artisti"] = array();
    foreach($templateParams["eventi"] as $evento){
        $artisti = $dbh->getArtistsFromEvent($evento["IDEvento"]);
        $templateParams["artisti"][$evento["IDEvento"]] = $artisti;
    }
    $templateParams["utente"] = $dbh -> getUtente(/*$_SESSION["id"]*/"1");
    require_once("./template/base.php");
?>