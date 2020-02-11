<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
   header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
   header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
function EventiPassati($array) { 
    return substr($array["DataEvento"], 0, 10) <= date("Y-m-d") ? TRUE : FALSE;
} 
$templateParams["page_content"] = "./template/gestore/storico_eventi_content.php";
$eventi= $dbh->getEventiAttiviDiOrganizzatore($_SESSION["id"]);
$templateParams["storicoEventi"] = array_filter($eventi, "EventiPassati");
require_once("./template/base.php"); 
?>