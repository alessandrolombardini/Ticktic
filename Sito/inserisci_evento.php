<?php 
require_once("./bootstrap.php");
$templateParams["page_content"] = "./template/gestore/inserisci_evento_content.php";
$templateParams["categorie"] = $dbh -> getCategories();
$templateParams["artisti"] = $dbh -> getArtisti();
$templateParams["azione"] = $_GET["action"];

if (isset($_GET["id"])){
    $templateParams["evento"] = $dbh -> getEvent($_GET["id"]);
    //$templateParams["artistiEvento"] = $dbh -> getArtistsFromEvent($_GET["id"]);
}

if (isset($_GET["msg"])){
    $templateParams["msg"] = $_GET["msg"];
}

require_once("./template/base.php");
?>