<?php
    require_once("./bootstrap.php");
    $templateParams["page_content"] = "./template/homepage_content.php";
    $templateParams["hide_search_bar"] = "y";
    $templateParams["rand_categories"] = $dbh->getRandomCategories();
    /* $templateParams["eventi_suggeriti"] = $dbh->getEventiSuggeriti();
    $templateParams["eventi_prossimi"] = $dbh->getProssimiEventi();
    if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
        $templateParams["eventi_dediserati"] = $dbh->getListaDesideri($_SESSION["id"]);
        $templateParams["eventi_acquistati"] = $dbh->getAcquisti($_SESSION["id"]);
    } */
    require_once("./template/base.php");
?>