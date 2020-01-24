<?php 
require_once("./bootstrap.php");
$templateParams["page_content"] = "./template/gestore/inserisci_evento_content.php";
$templateParams["categorie"] = $dbh -> getCategories();
$templateParams["artisti"] = $dbh -> getArtisti();
$templateParams["azione"] = $_GET["action"];

require_once("./template/base.php");
?>