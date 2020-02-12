<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="ORGANIZZATORE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
function ProssimiEventi($array) { 
    return substr($array["DataEvento"], 0, 10) >= date("Y-m-d") ? true : false;
} 
if (isset($_GET["deleteID"])){
    $id = $_GET["deleteID"];
    $dbh -> deleteEvent($id);
}
$templateParams["page_content"] = "./template/gestore/prossimi_eventi_organizzatore_content.php";
$eventi= $dbh->getEventiAttiviDiOrganizzatore($_SESSION["id"]);
$templateParams["prossimiEventi"] = array_filter($eventi, "ProssimiEventi");

require_once("./template/base.php"); 

?>
