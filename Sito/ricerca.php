<?php 
require_once("./bootstrap.php");
$templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */
if(isset($_POST["barraDiRicerca"]) && !empty($_POST["barraDiRicerca"])){
    $text = $_POST["barraDiRicerca"];
    $templateParams["eventi"]= $dbh->cercaEventi($text);
    $templateParams["categorie"]= $dbh->cercaCategorie($text);
    $templateParams["artisti"]= $dbh->cercaArtisti($text);
    $templateParams["page_content"] = "./template/ricerca_content.php";
} 
require_once("./template/base.php"); 
?>