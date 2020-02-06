<?php
    require_once("bootstrap.php");
    $templateParams["utente"] = $dbh -> getUtente($_SESSION["id"]);

    if (isset($_GET["deleteid"])){
        $dbh->rimuoviEventoDalCarrello($_GET["deleteid"], $_SESSION["id"]);
    }

    $templateParams["page_content"] = "./template/carrello_content.php";
    $templateParams["eventi"] = $dbh->getEventiCheDesideraAcquistare($_SESSION["id"]);
    $templateParams["artisti"] = array();
    foreach($templateParams["eventi"] as $evento){
        $artisti = $dbh->getArtistsFromEvent($evento["IDEvento"]);
        $templateParams["artisti"][$evento["IDEvento"]] = $artisti;
    }
    require_once("./template/base.php");
?>