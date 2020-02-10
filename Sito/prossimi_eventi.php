<?php 

function ProssimiEventi($array) 
{ 
    if(substr($array["DataEvento"], 0, 10) >= date("Y-m-d")){ 
       return TRUE; 
    }
    else {
       return FALSE;  
    }
} 

require_once("./bootstrap.php");
if (isset($_GET["deleteID"])){
    $id = $_GET["deleteID"];
    $dbh -> deleteEvent($id);
}
$templateParams["page_content"] = "./template/gestore/prossimi_eventi_content.php";
$eventi= $dbh->getEventiAttiviDiOrganizzatore($_SESSION["id"]);
$templateParams["prossimiEventi"] = array_filter($eventi, "ProssimiEventi");

require_once("./template/base.php"); 
