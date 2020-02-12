<?php 
require_once("./bootstrap.php");
if(isset($_POST["barraDiRicerca"]) && !empty($_POST["barraDiRicerca"])){
    $chiaveDiRicerca = $_POST["barraDiRicerca"];
    $templateParams["eventi"]= $dbh->cercaEventi($chiaveDiRicerca);
    $templateParams["categorie"]= $dbh->cercaCategorie($chiaveDiRicerca);
    $templateParams["artisti"]= $dbh->cercaArtisti($chiaveDiRicerca);
    $templateParams["page_content"] = "./template/ricerca_content.php";
} 
require_once("./template/base.php"); 
?>