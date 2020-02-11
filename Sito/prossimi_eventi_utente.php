<?php 
require_once("./bootstrap.php");
/****************************** Check permission **********************************/
if(!isset($_SESSION["id"])){
    header('Location: ./login.php');
} else if(isset($_SESSION["id"]) && $_SESSION["autorizzazione"]!="UTENTE"){
    header('Location: ./page_not_allowed.php');
}
/**********************************************************************************/
function ProssimiEventi($array) { 
    return substr($array["DataEvento"], 0, 10) >= date("Y-m-d") ? true : false;
} 
$templateParams["page_content"] = "./template/utente/prossimi_eventi_utente_content.php";
$eventi= $dbh->getEventiDiUtente($_SESSION["id"]);
$templateParams["prossimiEventi"] = array_filter($eventi, "ProssimiEventi");
require_once("./template/base.php"); 
?>
