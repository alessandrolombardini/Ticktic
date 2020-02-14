<?php
    function ProssimiEventi($array) { 
        return substr($array["DataEvento"], 0, 10) >= date("Y-m-d") ? true : false;
    } 

    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/homepage_content.php";
    $templateParams["hide_search_bar"] = "y";
    $templateParams["rand_categories"] = $dbh->getRandomCategories();
    $templateParams["eventi_suggeriti"] = $dbh->getEventiSuggeriti();
    
    /* $eventi = $dbh->getAllEvents();
    $templateParams["eventi_prossimi"] = array_filter($eventi, "ProssimiEventi"); */
    $templateParams["eventi_prossimi"] = $dbh->getProssimiEventi();

    if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]=="UTENTE"){
        $templateParams["eventi_dediserati"] = $dbh->ottieniEventiDiInteresseDiUnUtente($_SESSION["id"]);
        $templateParams["eventi_acquistati"] = $dbh->getAcquisti($_SESSION["id"]);
    }

    require_once("./template/base.php");
?>