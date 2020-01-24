<?php require_once("./bootstrap.php");
$templateParams["page_content"] = "./template/gestore/prossimi_eventi_content.php";
$templateParams["categorie"] = $dbh -> getCategories();
$templateParams["artisti"] = $dbh -> getArtisti();
$templateParams["azione"] = $_GET["action"];

require_once("./template/base.php"); 

/*
visualizzazione come quella di tutti gli eventi (rimanda lì), 
ma cliccando su evento si va alla pagina inserisci_evento?action=2&id=idevento!!

la modifica la linko direttamente dal bottone con l'id di esempio 1
*/?>

