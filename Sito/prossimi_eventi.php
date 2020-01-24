<?php require_once("./bootstrap.php");
$templateParams["page_content"] = "./template/gestore/prossimi_eventi_content.php";
$templateParams["categorie"] = $dbh -> getCategories();
$templateParams["artisti"] = $dbh -> getArtisti();
$templateParams["azione"] = $_GET["action"];

require_once("./template/base.php"); ?>