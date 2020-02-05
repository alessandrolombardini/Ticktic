<?php 
    require_once("bootstrap.php");
    $templateParams["page_content"] = "./template/utente/ordini_content.php";

    $templateParams["ordini"] = $dbh -> getOrdiniDiUtente($_SESSION["id"]);
    $templateParams["eventiinordine"] = array();
    foreach($templateParams["ordini"] as $ordine){
        $eventi = $dbh->getEventiDiOrdine($ordine["IDOrdine"]);
        $templateParams["eventiinordine"][$ordine["IDOrdine"]] = $eventi;
    }
    require_once("./template/base.php");
?>