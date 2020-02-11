<?php 

function EventiPassati($array) 
{ 
    if(substr($array["DataEvento"], 0, 10) <= date("Y-m-d")){ 
       return TRUE; 
    }
    else {
       return FALSE;  
    }
} 

require_once("./bootstrap.php");
$templateParams["page_content"] = "./template/gestore/storico_eventi_content.php";
$eventi= $dbh->getEventiAttiviDiOrganizzatore($_SESSION["id"]);
$templateParams["storicoEventi"] = array_filter($eventi, "EventiPassati");
$templateParams["categories"] = $dbh->getCategories(); /* For Footer Links */

require_once("./template/base.php"); 

?>